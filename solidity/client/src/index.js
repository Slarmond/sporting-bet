const getWeb3 = () => {
    return new Promise((resolve, reject) => {
        window.addEventListener("load", async () => {
            if (window.ethereum) {
                const web3 = new Web3(window.ethereum);
                try {
                    // ask user permission to access his accounts
                    await window.ethereum.request({ method: "eth_requestAccounts" });
                    resolve(web3);
                } catch (error) {
                    reject(error);
                }
            } else {
                reject("must install MetaMask");
            }
        });
    });
};

const getContract = async (web3) => {
    const data = await $.getJSON("./contracts/Greeting.json");

    const netId = await web3.eth.net.getId();
    const deployedNetwork = data.networks[netId];
    const greeting = new web3.eth.Contract(
        data.abi,
        deployedNetwork && deployedNetwork.address
    );
    return greeting;
};


const displayGreeting = async (greeting, contract) => {
    greeting = await contract.methods.sayHello().call();
    $("h2").html(greeting);
};

const updateGreeting = (greeting, contract, accounts) => {
    let input;
    $("#input").on("change", (e) => {
        input = e.target.value;
    });
    $("#form").on("submit", async (e) => {
        e.preventDefault();
        await contract.methods
            .updateGreeting(input)
            .send({ from: accounts[0], gas: 40000 });
        displayGreeting(greeting, contract);
    });
};

async function greetingApp() {
    const web3 = await getWeb3();
    const accounts = await web3.eth.getAccounts();
    const contract = await getContract(web3);
    let greeting;

    displayGreeting(greeting, contract);
    updateGreeting(greeting, contract, accounts);
};

greetingApp();