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
        const buyButton = document.querySelector("#button--buy");
        const sellButton = document.querySelector("#button--sell");
        if (mintButton) {
            mintButton.addEventListener("click", this.mintNFT.bind(this));
        }
        if (buyButton) {
            buyButton.addEventListener("click", this.buyNFT.bind(this));
        }
        if (sellButton) {
            sellButton.addEventListener("click", this.sellNFT.bind(this));
        }
        const contract = new ethers.Contract(
            this.contractAddress,
            this.contractAbi,
            this.provider
        );
    }

    toggleMintLoading(loading) {
        if (loading) {
            document.querySelector("#button--mint").innerHTML = "Loading...";
        } else {
            document.querySelector("#button--mint").innerHTML = "Mint";
        }
    }

    toggleBuyLoading(loading) {
        if (loading) {
            document.querySelector("#button--buy").innerHTML = "Loading...";
        } else {
            document.querySelector("#button--buy").innerHTML = "Buy";
        }
    }
    toggleSellLoading(loading) {
        if (loading) {
            document.querySelector("#button--sell").innerHTML = "Loading...";
        } else {
            document.querySelector("#button--sell").innerHTML = "Sell";
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

    toggleErrorMessage(show, message) {
        if (show) {
            document.querySelector("#nft-error-msg").innerHTML = message;
            document.querySelector("#nft-error").classList.remove("hidden");
        } else {
            document.querySelector("#nft-error").classList.add("hidden");
        }
    }

    async validateNFTOwnership(nftId) {
        fetch("validate", {
            method: "POST",
            body: JSON.stringify({ nftId }),
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

    async saveNftToken(tokenId, price, nftId) {
        fetch("saveNftToken", {
            method: "POST",
            body: JSON.stringify({ tokenId, price, nftId }),
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

    async transferNft(tokenId, nftId) {
        fetch("transferNft", {
            method: "POST",
            body: JSON.stringify({ tokenId, nftId }),
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

    async putNftForSale(nftId) {
        fetch("sellNft", {
            method: "POST",
            body: JSON.stringify({ price, nftId }),
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
            this.toggleMintLoading(true);
            const contract = new ethers.Contract(
                this.contractAddress,
                this.contractAbi,
                this.provider
            );

            const price = document.querySelector("#nft--price").value;
            console.log(price, price + price, parseFloat(price));
            console.log(isNaN(parseFloat(price)), !(parseFloat(price) >= 0));
            if (isNaN(parseFloat(price)) || !(parseFloat(price) > 0)) {
                throw new Error("The price must be greater than 0");
            }
            const tokenURI = document.querySelector("#nft--hash").value;
            const nftId = document.querySelector("#nft--id").value;
            if (!this.validateNFTOwnership(nftId)) {
                throw new Error(
                    "You can not mint this NFT since you are not the owner!"
                );
            }

            const contractWithSigner = await contract.connect(this.signer);
            const tx = await contractWithSigner
                .mintNFT(tokenURI, ethers.utils.parseEther(price))
                .catch((e) => {
                    console.log("Something went wrong there...");
                    console.error(e);
                    this.toggleMintLoading(false);
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
                    const success = this.saveNftToken(
                        result,
                        parseFloat(price),
                        nftId
                    );
                    if (!success) {
                        this.toggleMintLoading(false);
                        throw new Error(
                            "Something went wrong when minting your NFT, try again later!"
                        );
                    } else {
                        this.toggleMintLoading(false);
                        console.log("success!!");
                        this.toggleSuccessMessage(
                            true,
                            "You successfully minted your NFT!"
                        );
                        this.toggleErrorMessage(false, "");
                        document
                            .querySelector("#nft--not-minted")
                            .classList.add("hidden");
                    }
                })
                .catch((e) => {
                    this.toggleErrorMessage(true, e.message);
                    console.error(e);
                });
        } catch (e) {
            console.error(e);
            this.toggleErrorMessage(true, e.message);
            this.toggleMintLoading(false);
        }
    }

    async buyNFT() {
        try {
            this.toggleBuyLoading(true);
            const contract = new ethers.Contract(
                this.contractAddress,
                this.contractAbi,
                this.provider
            );
            const price = document.querySelector("#nft--setprice").value;
            const tokenId = document.querySelector("#nft--token").value;
            const nftId = document.querySelector("#nft--id").value;
            console.log(tokenId);
            const contractWithSigner = await contract.connect(this.signer);
            const tx = await contractWithSigner
                .buyNFT(parseInt(tokenId), {
                    value: ethers.utils.parseEther(price),
                })
                .catch((e) => {
                    console.log("Something went wrong there...");
                    console.error(e);
                    this.toggleBuyLoading(false);
                });
            await tx
                .wait()
                .then((res) => {
                    this.transferNft(tokenId, nftId);
                    this.toggleBuyLoading(false);
                    this.toggleSuccessMessage(
                        true,
                        "You Successfully bought this NFT!"
                    );
                    this.toggleErrorMessage(false, "");
                    document.querySelector("#nft--buy").classList.add("hidden");
                })
                .catch((e) => {
                    console.error(e);
                    this.toggleErrorMessage(true, e.message);
                    this.toggleBuyLoading(false);
                });
        } catch (e) {
            console.error(e);
        }
    }

    async sellNFT() {
        try {
            this.toggleSellLoading(true);
            const contract = new ethers.Contract(
                this.contractAddress,
                this.contractAbi,
                this.provider
            );

            const price = document.querySelector("#nft--price").value;
            if (isNaN(parseFloat(price)) || !(parseFloat(price) > 0)) {
                throw new Error("The price must be greater than 0");
            }
            const nftId = document.querySelector("#nft--id").value;
            const tokenId = document.querySelector("#nft--token").value;
            if (!this.validateNFTOwnership(nftId)) {
                throw new Error(
                    "You can not sell this NFT since you are not the owner!"
                );
            }

            const contractWithSigner = await contract.connect(this.signer);
            const tx = await contractWithSigner
                .putUpForSale(tokenId, ethers.utils.parseEther(price))
                .catch((e) => {
                    console.log("Something went wrong there...");
                    console.error(e);
                    this.toggleErrorMessage(true, e.message);
                    this.toggleMintLoading(false);
                });
            await tx
                .wait()
                .then((res) => {
                    this.putNftForSale(parseFloat(price), nftId);
                    this.toggleSellLoading(false);
                })
                .catch((e) => {
                    console.error(e);
                });
        } catch (e) {
            console.error(e);
            this.toggleErrorMessage(true, e.message);
            this.toggleMintLoading(false);
        }
    }

    async loadAbi() {
        return fetch("../abi/MyNFT.json")
            .then((response) => {
                return response.json();
            })
            .then((json) => {
                this.contractAbi = json;
            });
    }

    async contractLoadDetails() {
        const contract = new ethers.Contract(
            this.contractAddress,
            this.contractAbi,
            this.provider
        );
    }

    async loginWithMetaMask() {
        if (typeof window.ethereum !== "undefined") {
            const accounts = await ethereum.request({
                method: "eth_requestAccounts",
            });
            this.account = accounts[0];
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
