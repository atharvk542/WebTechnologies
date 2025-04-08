<!DOCTYPE html>
<html>
<head>
  <title>PHP Certificate</title>
  <style>
    body {
      font-family: 'Georgia', serif;
      background-color: #f0f0f0; /* Slightly lighter background */
      text-align: center;
      padding: 50px;
    }
    .certificate {
      border: 15px double #333; /* Changed to double border */
      padding: 40px;
      background-color: white;
      width: 800px;
      margin: 0 auto;
      box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
    }
    .certificate h1 {
      font-size: 55px; /* Increased font size */
      color: #003366;
    }
    .certificate h2 {
      font-size: 32px; /* Slightly larger font */
      color: #555;
    }
    .certificate p {
      font-size: 22px; /* Larger font for text */
    }
    .ribbon {
      font-size: 70px; /* Larger ribbon */
      color: red;
    }
    .footer {
      margin-top: 50px;
      font-style: italic;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="certificate">
    <div class="ribbon">🎓</div>
    <h1>Certificate of Achievement</h1>
    <h2>This is to certify that</h2>
    <h2 style="font-size: 35px; color: #000;">
      <?php echo htmlspecialchars($_GET['name'] ?? ''); ?>
    </h2>
    <p>has successfully passed the PHP Certification Exam</p>
    <p>with a score of <strong>70% or higher</strong></p>
    <br>
    <p>Date: <script>document.write(new Date().toLocaleDateString());</script></p>
    <div class="footer">Fictional Institute of PHP Certification</div>
  </div>
</body>
</html>