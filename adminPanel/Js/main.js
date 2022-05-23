async function loadWeb3() {
    if (window.ethereum) {
        window.web3 = new Web3(window.ethereum);
        window.ethereum.enable();
    }
}

async function loadContract() {
    return await new window.web3.eth.Contract([{
        "inputs": [{
            "internalType": "int256",
            "name": "_confID",
            "type": "int256"
        }, {
            "internalType": "string",
            "name": "_cTitle",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "_cStartDate",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "_cEndDate",
            "type": "string"
        }],
        "name": "addNewConference",
        "outputs": [],
        "stateMutability": "nonpayable",
        "type": "function"
    }, {
        "inputs": [{
            "internalType": "int256",
            "name": "_pID",
            "type": "int256"
        }, {
            "internalType": "string",
            "name": "_pFName",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "_pLName",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "_pQualif",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "_pSpecialty",
            "type": "string"
        }],
        "name": "addNewPerson",
        "outputs": [],
        "stateMutability": "nonpayable",
        "type": "function"
    }, {
        "inputs": [{
            "internalType": "int256",
            "name": "_sID",
            "type": "int256"
        }, {
            "internalType": "string",
            "name": "_sTitle",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "_sStartDate",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "_sEndDate",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "_sPresenter",
            "type": "string"
        }],
        "name": "addNewSession",
        "outputs": [],
        "stateMutability": "nonpayable",
        "type": "function"
    }, {
        "inputs": [],
        "stateMutability": "nonpayable",
        "type": "constructor"
    }, {
        "inputs": [],
        "name": "confCount",
        "outputs": [{
            "internalType": "int256",
            "name": "",
            "type": "int256"
        }],
        "stateMutability": "view",
        "type": "function"
    }, {
        "inputs": [{
            "internalType": "int256",
            "name": "",
            "type": "int256"
        }],
        "name": "conferenceRecords",
        "outputs": [{
            "internalType": "int256",
            "name": "confID",
            "type": "int256"
        }, {
            "internalType": "string",
            "name": "cTitle",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "cStartDate",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "cEndDate",
            "type": "string"
        }],
        "stateMutability": "view",
        "type": "function"
    }, {
        "inputs": [],
        "name": "pCount",
        "outputs": [{
            "internalType": "int256",
            "name": "",
            "type": "int256"
        }],
        "stateMutability": "view",
        "type": "function"
    }, {
        "inputs": [{
            "internalType": "int256",
            "name": "",
            "type": "int256"
        }],
        "name": "peopleRecords",
        "outputs": [{
            "internalType": "int256",
            "name": "pID",
            "type": "int256"
        }, {
            "internalType": "string",
            "name": "pFName",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "pLName",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "pQualif",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "pSpecialty",
            "type": "string"
        }],
        "stateMutability": "view",
        "type": "function"
    }, {
        "inputs": [],
        "name": "sCount",
        "outputs": [{
            "internalType": "int256",
            "name": "",
            "type": "int256"
        }],
        "stateMutability": "view",
        "type": "function"
    }, {
        "inputs": [{
            "internalType": "int256",
            "name": "",
            "type": "int256"
        }],
        "name": "sessionRecords",
        "outputs": [{
            "internalType": "int256",
            "name": "sID",
            "type": "int256"
        }, {
            "internalType": "string",
            "name": "sTitle",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "sStartDate",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "sEndDate",
            "type": "string"
        }, {
            "internalType": "string",
            "name": "sPresenter",
            "type": "string"
        }],
        "stateMutability": "view",
        "type": "function"
    }], '0x6e908d5C5379337b314a14A0D5BE79c38BC864eb');
}

async function printCoolNumber() {
    updateStatus('fetching Cool Number...');
    const coolNumber = await window.contract.methods.coolNumber().call();
    updateStatus(`coolNumber: ${coolNumber}`);
}

async function getCurrentAccount() {
    const accounts = await window.web3.eth.getAccounts();
    return accounts[0];
    r
}

async function changeCoolNumber() {
    const value = Math.floor(Math.random() * 100);
    updateStatus(`Updating coolNumber with ${value}`);
    const account = await getCurrentAccount();
    const coolNumber = await window.contract.methods.setCoolNumber(value).send({
        from: account
    });
    updateStatus('Updated.');
}

//adding Person
async function addPerson() {
    const value = (Math.random() + 1).toString(36).substring(7);
    updateStatus(`Adding Person ${value}`);
    const account = await getCurrentAccount();
    const aPerson = await window.contract.methods.addNewPerson(value, value, value, value).send({
        from: account
    });
    updateStatus('Person Added.');
}
// show person
async function showAPerson() {
    updateStatus('fetching Person...');
    const aPerson = await window.contract.methods.peopleRecords([0]).call();
    updateStatus(`Person is: ${aPerson[0] +" "+ aPerson[1]+ " "+ aPerson[2]+ " "+ aPerson[3]}`);
}

//show all persons
async function showAllPersons() {
    const n = await window.contract.methods.pCount().call();
    var kk = "";
    for (i = 1; i <= n; i++) {
        var aPerson = await window.contract.methods.peopleRecords([i]).call();
        kk += "<li>" + aPerson[0] + " " + aPerson[1] + " " + aPerson[2] + " " + aPerson[3] + "</li>"
    }
    var ppl = document.getElementById('persons');
    ppl.innerHTML = kk;
}

async function load() {
    await loadWeb3();
    window.contract = await loadContract();
    updateStatus('Ready!');
}

function updateStatus(status) {
    const statusEl = document.getElementById('status');
    statusEl.innerHTML = status;
    console.log(status);
}



load();