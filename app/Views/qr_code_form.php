<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>
<body>
    <h1>Generate QR Code</h1>
    <input type="text" id="qrText" placeholder="Enter text or URL">
    <button onclick="generateQRCode()">Generate QR Code</button>
    <br><br>
    <div id="printableArea">
        <img id="qrCode" src="" alt="">
    </div>
    <div class="TextDisplay"> 
        <p id="qrTextDisplay"></p>
    </div>

    <script>
        function generateQRCode() {
            const qrText = document.getElementById('qrText').value;
            const qrCodeImg = document.getElementById('qrCode');
            const qrTextDisplay = document.getElementById('qrTextDisplay');

            // Update the p tag with the input text
            qrTextDisplay.textContent = qrText;
            qrCodeImg.src = `<?= base_url('QrCodeController/generate') ?>?text=${encodeURIComponent(qrText)}`;
            qrCodeImg.onload = function() {
                window.print(); // Automatically opens the print dialog when the QR code is loaded
            };
        }
    </script>
</body>

<style>
    .TextDisplay{
        width: 300px;
    }
    #qrTextDisplay{
        text-align: center;
        margin: -10px 0 0 0;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        #qrCode, #qrCode * {
            visibility: visible;
        }
        #qrCode {
            position: absolute;
            top: 0;
            left: 0;
        }
        @page {
            size: 300px 300px;
            margin: 0;
        }
    }
</style>

</html>
