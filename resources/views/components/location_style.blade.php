<style>
    .loading{
        display: none;
    }
    .ic-loader {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        text-align: center;
        /* margin-left: -50px;
                      margin-top: -100px; */
        z-index: 2;
        overflow: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.833);
        z-index: 999999;
    }

    .loader {
        width: 48px;
        height: 48px;
        border: 3px solid #0C7A13;
        border-bottom-color: transparent;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>