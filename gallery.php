    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
    font-family: Verdana, sans-serif;
    margin: 0;
    }

    * {
    box-sizing: border-box;
    }

    .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    }

    .column {
    flex: 1 1 25%;
    max-width: 25%;
    padding: 8px;
    }

    .column img {
    width: 90%;
    height: auto;
    max-height: 200px; 
    object-fit: cover; 
    cursor: pointer;
    transition: 0.3s;
    }

    .column img:hover {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    /* The Modal (background) */
    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.9);
    padding-top: 60px;
    }

    .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    }

    .modal-content, .caption {  
    animation-name: zoom;
    animation-duration: 0.6s;
    }

    @keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
    }

    .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    }

    .close:hover,
    .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
    }

    @media screen and (max-width: 700px) {
    .column {
        flex: 1 1 50%;
        max-width: 50%;
    }
    }
    </style>
    </head>
    <body>

    <h2 style="text-align:center">Uploaded Images</h2>

    <div class="row">
    <?php
    $directory = 'uploads/';
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif'); 
    $file_parts = [];

    // Scan directory for files
    $files = scandir($directory);
    foreach ($files as $file) {
        $file_parts = pathinfo($file);
        if (in_array(strtolower($file_parts['extension']), $allowed_types)) {
            echo '
            <div class="column">
                <img src="' . $directory . $file . '" onclick="openModal();currentSlide(\'' . $directory . $file . '\')" alt="Image">
            </div>';
        }
    }
    ?>
    </div>

    <div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImage">
    </div>

    <script>
    function openModal() {
    document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
    document.getElementById("myModal").style.display = "none";
    }

    function currentSlide(src) {
    document.getElementById("modalImage").src = src;
    }
    </script>

    </body>
    </html>