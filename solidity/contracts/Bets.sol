pragma solidity ^0.5.0;
import "https://github.com/OpenZeppelin/openzeppelin-contracts/blob/release-v2.5.0/contracts/token/ERC721/ERC721Full.sol";
import "https://github.com/OpenZeppelin/openzeppelin-contracts/blob/release-v2.5.0/contracts/drafts/Counters.sol";
import "https://github.com/OpenZeppelin/openzeppelin-contracts/blob/release-v2.5.0/contracts/ownership/Ownable.sol";
import "./Copy_Sports_bets.sol";
contract Bets is ERC721Full, Ownable {
    constructor() ERC721Full("SportsBet", "SPORT") public {}
    using Counters for Counters.Counter;
    Counters.Counter token_ids;
    address payable foundation_address = msg.sender;
    mapping(uint => Bet) public bets;
    modifier betMade(uint token_id) {
        require(_exists(token_id), "Bet not made!");
        _;
    }
    function registerBet(string memory uri) public payable onlyOwner {
        token_ids.increment();
        uint token_id = token_ids.current();
        _mint(foundation_address, token_id);
        _setTokenURI(token_id, uri);
        createBet(token_id);
    }
    function createBet(uint token_id) public onlyOwner {
        bets[token_id] = new Bet(foundation_address);
    }
    function closeBet(uint token_id) public onlyOwner registerBet(token_id) {
        Bet bet = bets[token_id];
        bets.auctionEnd();
        safeTransferFrom(owner(), bet.winner(), token_id);
    }
    function betEnded(uint token_id) public view returns(bool) {
        Bet bet = bets[token_id];
        return bet.ended();
    }
    function betWinner(uint token_id) public view registerBet(token_id) returns(uint) {
        Bet bet = bets[token_id];
        return bet.winner();
    }
    function pendingReturn(uint token_id, address sender) public view registerBet(token_id) returns(uint) {
        Bet bet = bets[token_id];
        return bet.pendingClose(sender);
    }
    function agreeToBEt(uint token_id) public payable registerBet(token_id) {
        Bet bet = bets[token_id];
        auction.bet.value(msg.value)(msg.sender);
    }
}
