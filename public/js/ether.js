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

    toggleLoading(loading) {
        if (loading) {
            document.querySelector("#button--mint").innerHTML = "Loading...";
        } else {
            document.querySelector("#button--mint").innerHTML = "Mint";
        }
    }

    toggleSuccessMessage(show, message) {
        if (show) {
            document.querySelector("#nft-success-msg").innerHTML = message;
            document.querySelector("#nft-success").classList.remove("hidden");
        } else {
            document.querySelector("#nft-success").classList.add("hidden");
        }
    }

    async validateNFTOwnership(tokenURI) {
        fetch("validate", {
            method: "POST",
            body: JSON.stringify({ tokenURI }),
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        })
            .then((response) => {
                console.log(response);
                return response.json();
            })
            .then((result) => {
                if (result.status === 200) {
                    return true;
                } else {
                    return false;
                }
            })
            .catch((error) => {
                console.error(error);
                return false;
            });
    }

    async saveNftToken(tokenId, tokenURI) {
        fetch("saveNftToken", {
            method: "POST",
            body: JSON.stringify({ tokenId, tokenURI }),
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        })
            .then((response) => {
                return response.json();
            })
            .then((result) => {
                if (result.status === 200) {
                    return true;
                } else {
                    return false;
                }
            })
            .catch((error) => {
                console.error(error);
                return false;
            });
    }

    async mintNFT() {
        try {
            this.toggleLoading(true);
            const contract = new ethers.Contract(
                this.contractAddress,
                this.contractAbi,
                this.provider
            );

            const price = document.querySelector("#nft--price").value;
            console.log(price, price + price, parseFloat(price));
            console.log(isNaN(parseFloat(price)), !(parseFloat(price) >= 0));
            if (isNaN(parseFloat(price)) || !(parseFloat(price) > 0)) {
                throw "The price must be greater than 0";
            }
            const tokenURI = document.querySelector("#nft--hash").value;
            if (!this.validateNFTOwnership(tokenURI)) {
                throw "You can not mint this NFT since you are not the owner!";
            }

            const contractWithSigner = await contract.connect(this.signer);
            const tx = await contractWithSigner
                .mintNFT(tokenURI, ethers.utils.parseEther(price))
                .catch((e) => {
                    console.log("Something went wrong there...");
                    console.error(e);
                    this.toggleLoading(false);
                });
            await tx
                .wait()
                .then((res) => {
                    const tokenIdString = res["events"][0]["topics"][3];
                    const tokenId =
                        ethers.BigNumber.from(tokenIdString).toString();
                    return tokenId;
                })
                .then((result) => {
                    const success = this.saveNftToken(result, tokenURI);
                    if (!success) {
                        this.toggleLoading(false);
                        throw "Something went wrong when minting your NFT, try again later!";
                    } else {
                        this.toggleLoading(false);
                        console.log("success!!");
                        this.toggleSuccessMessage(
                            true,
                            "You successfully minted your NFT!"
                        );
                    }
                })
                .catch((e) => {
                    console.error(e);
                });

            // this.logToConsole("Congrats! You are now an investor!");
        } catch (e) {
            console.error(e);
            this.toggleLoading(false);
        }
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
