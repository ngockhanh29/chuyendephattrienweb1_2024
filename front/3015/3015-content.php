<?php
$url_host = $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';
preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="type-3015">
    <div class="container">
        <div class="col-1 fade-up">
            <h1>Contact us</h1>
            <h4>Start the conversation to establish a good<br> relationship and business.</h4>
        </div>
        <div class="col-2">
            <div class="left-column slideInLeft">
                <h5>GET IN TOUCH</h5>
                <h1>Seamless Communication, Global Impact.</h1>
                <p>Cras hendrerit facilisi bibendum magnis tempor convallis consectetuer dolor suspendisse auctor vehicula</p>
                <div class="info-item">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-text">
                        <h3>Head Office</h3>
                        <p>Jln Cempaka Wangi No 22<br>Jakarta - Indonesia</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="info-text">
                        <h3>Let's Talk</h3>
                        <p>Phone: +6221.2002.2012<br>Fax: +6221.2002.2013</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-text">
                        <h3>Email Support</h3>
                        <p>support@yourdomain.tld<br>hello@yourdomain.tld</p>
                    </div>
                </div>
            </div>

            <div class="right-column slideInRight">
                <div class="card">
                    <h1>Send us a message</h1>
                    <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" placeholder="Company" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" placeholder="Message" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">SEND</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>