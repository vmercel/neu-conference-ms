const contractABI = [{"constant":false,"inputs":[{"internalType":"string","name":"_firstName","type":"string"},{"internalType":"string","name":"_lastName","type":"string"}],"name":"addPerson","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"constant":true,"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"people","outputs":[{"internalType":"uint256","name":"_id","type":"uint256"},{"internalType":"string","name":"_firstName","type":"string"},{"internalType":"string","name":"_lastName","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"peopleCount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"}];
const contractAddress = '0xd9145CCE52D386f254917e481eB44e9943F39138';
const contractInstance = web3.eth.contract(contractABI).at(contractAddress)

function findPeople() {
    contractInstance.userInfo(web3.eth.accounts[0], (err, people) => {
        if(err) return alert(err)

        let profileContent = ''
        myid = web3.toUtf8(people[0])
        let myFirstName = web3.toUtf8(people[1])
        let myLastname = people[2]
profileContent += `
            ID: <span id="my-name">${myid}</span> <br/>
            FirstName: <span id="my-occupation">${myFirstName}</span> <br/>
            LastName: <span id="my-bio">${myLastName}</span> <br/>
            <button id="set-profile-button" class="align-center" onclick="setProfile()">Set Profile</button>`
        document.querySelector('#profile-content').innerHTML = profileContent
    })
}
