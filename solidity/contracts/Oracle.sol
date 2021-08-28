pragma solidity >0.5.0;

import "./OracleInterface.sol";


 
contract SportsBets {

    //mappings
    mapping(address => bytes32[]) private userToBets;
    mapping(bytes32 => Bet[]) private matchToBets;

    //match results oracle 
    OracleInterface internal sportsOracle = new OracleInterface(); 

    //constants
    uint internal minimumBet = 1000000000000;

    struct Bet {
        address user;
        bytes32 matchId;
        uint amount; 
        uint8 chosenWinner; 
    }

    enum BettableOutcome {
        Team1,
        Team2
    }

    /// @notice determines whether or not the user has already bet on the given match
    /// @param _user address of a user
    /// @param _matchId id of a match 
    /// @param _chosenWinner the index of the participant to bet on (to win)
    /// @return true if the given user has already placed a bet on the given match 
    function _betIsValid(address _user, bytes32 _matchId, uint8 _chosenWinner) private view returns (bool) {

        return true;
    }

    /// @notice determines whether or not bets may still be accepted for the given match
    /// @param _matchId id of a match 
    /// @return true if the match is bettable 
    function _matchOpenForBetting(bytes32 _matchId) private view returns (bool) {
        
        return true;
    }

 
    /// @notice gets a list ids of all currently bettable matches
    /// @return array of match ids 
    function getBettableMatches() public view returns (bytes32[]) {
        return Oracle.getPendingMatches(); 
    }

    /// @notice returns the full data of the specified match 
    /// @param _matchId the id of the desired match
    /// @return match data 
    function getMatch(bytes32 _matchId) public view returns (
        bytes32 id,
        string name, 
        string participants,
        uint8 participantCount,
        uint date, 
        OracleInterface.MatchOutcome outcome, 
        int8 winner) { 

        return Oracle.getMatch(_matchId); 
    }