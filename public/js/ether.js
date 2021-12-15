class App {
    constructor() {
        this.contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
        this.contractAbi = "";
        this.account = "";
        this.provider = "";
        this.signer = "";
        this.loggedin = false;
        this.launch();
    }

    async launch() {
        await this.loginWithMetaMask();
        await this.loadAbi();
        await this.contractLoadDetails();
        this.setupEvents();
    }

    setupEvents() {
        const mintButton = document.querySelector("#button--mint");
        mintButton.addEventListener("click", this.mintNFT.bind(this));
        const contract = new ethers.Contract(
            this.contractAddress,
            this.contractAbi,
            this.provider
        );

        // contract.on("Investment", (from, value) => {
        //     this.logToConsole(
        //         `New investment from ${from} for ${ethers.utils.formatEther(
        //             value
        //         )}`
        //     );
        //     this.throwConfetti();
        // });

        // contract.on("Payout", (value) => {
        //     this.logToConsole(
        //         `Payout done by Chainify for ${ethers.utils.formatEther(value)}`
        //     );
        //     this.throwConfetti();
        // });
    }

    async mintNFT() {
        try {
            //   this.logToConsole("Loading the contract code.");
            const contract = new ethers.Contract(
                this.contractAddress,
                this.contractAbi,
                this.provider
            );
            console.log("runs mintNFT");
            const contractWithSigner = await contract.connect(this.signer);
            console.log(contractWithSigner);
            const tokenURI = document.querySelector("#nft--hash");
            const tx = await contractWithSigner
                .mintNFT(tokenURI, ethers.utils.parseEther("0.0002"))
                .catch((e) => {
                    if (e.message.includes("You can only invest once")) {
                        // this.logToConsole("You can only invest once.");
                    } else {
                        console.log("Something went wrong there...");
                        console.log(e);
                        // this.logToConsole("Something went wrong there...");
                    }
                });
            await tx.wait();
            console.log("finished!");
            console.log(tx);
            // this.logToConsole("Congrats! You are now an investor!");
        } catch (e) {}
    }

    async loadAbi() {
        // this.logToConsole("Loading the contract code.");
        return fetch("../abi/MyNFT.json")
            .then((response) => {
                return response.json();
            })
            .then((json) => {
                this.contractAbi = json;
                // this.logToConsole("Contract loaded, you can now invest. 😎");
            });
    }

    async contractLoadDetails() {
        // this.logToConsole("Loading contract details.");
        const contract = new ethers.Contract(
            this.contractAddress,
            this.contractAbi,
            this.provider
        );
    }

    async loginWithMetaMask() {
        // https://docs.metamask.io/guide/getting-started.html
        if (typeof window.ethereum !== "undefined") {
            const accounts = await ethereum.request({
                method: "eth_requestAccounts",
            });
            this.account = accounts[0];
            // this.logToConsole(`Cool, we're connected to ${this.account}`);
            await this.setupProvider();
        }
    }

    async setupProvider() {
        this.provider = await new ethers.providers.Web3Provider(
            window.ethereum
        );
        this.signer = this.provider.getSigner();
    }
}

let web3IsHere = new App();
