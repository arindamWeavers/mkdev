<?php
/**
 * Template Name: ERISA Factsheet Page
 *
 * @package colonialsurety
 */
$ref = !empty($_GET['ref']) ? $_GET['ref'] : 'AA9999';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php the_title(); ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,600,600i,700,700i" rel="stylesheet">
  <style>
    html {
      -webkit-box-sizing: border-box;
              box-sizing: border-box;
    }
    *, *:before, *:after {
      -webkit-box-sizing: inherit;
              box-sizing: inherit;
    }
    body {
      margin: 0;
    }
    a {
      display: inline-block;
      color: inherit;
      font-weight: 700;
      line-height: 1.3;
      text-decoration: none;
      border-bottom: 2px solid #cf2127
    }
    a:hover,
    a:focus {
      color: #cf2127;
    }
    a[href^="tel:"] {
      border-bottom: none;
    }
    h1 {
      width: 794px;
      margin-top: 0;
      margin-bottom: 55px;
      margin-left: auto;
      margin-right: auto;
      font-size: 42px;
      font-weight: 700;
      line-height: 1.29;
      text-align: center;
    }
    h2 {
      margin-top: 0;
      margin-bottom: 40px;
      font-size: 36px;
      line-height: 1.39;
    }
    strong {
      font-weight: 700;
    }
    em {
      font-style: italic;
    }
    p {
      margin-top: 0;
      margin-bottom: 24px;
    }
    .page {
      position: relative;
      width: 1200px;
      margin-top: 50px;
      margin-left: auto;
      margin-right: auto;
      border: 1px solid black;
      font-family: 'IBM Plex Sans', sans-serif;
      font-size: 17px;
      line-height: 26px;
      color: #102938;
      overflow: hidden;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      -webkit-transform: scale(0.91);
          -ms-transform: scale(0.91);
              transform: scale(0.91);
      -webkit-transform-origin: 0 0;
          -ms-transform-origin: 0 0;
              transform-origin: 0 0;
    }
    .top {
      position: relative;
      padding-top: 123px;
      padding-bottom: 90px;
      padding-left: 116px;
      padding-right: 116px;
      overflow: hidden;
    }
    .top:before,
    .top:after {
      content: ' ';
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 566px;
      height: 565px;
      border: 155px solid #cf2127;
      border-radius: 50%;
      -webkit-transform: translate(-63%, -45%);
      -ms-transform: translate(-63%, -45%);
          transform: translate(-63%, -45%);
    }
    .top:after {
      top: auto;
      bottom: 0;
      left: auto;
      right: 0;
      border-color: #102938;
      -webkit-transform: translate(57%, 57%);
      -ms-transform: translate(57%, 57%);
          transform: translate(57%, 57%);
    }
    .top__copy {
      width: 800px;
    }
    .columns {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: justify;
          -ms-flex-pack: justify;
              justify-content: space-between;
    }
    .column {
      width: calc(50% - 20px);
    }
    .callout {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      height: 278px;
      padding-top: 16px;
      padding-bottom: 16px;
      padding-left: 18px;
      padding-right: 35px;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
          -ms-flex-direction: column;
              flex-direction: column;
      -webkit-box-pack: justify;
          -ms-flex-pack: justify;
              justify-content: space-between;
      font-size: 24px;
      line-height: 36px;
      background-color: #f0f2f4;
    }
    .callout p {
      margin: 0;
    }
    .callout cite {
      font-size: 15px;
      line-height: 24px;
      font-style: italic;
    }
    .packages {
      margin-left: 1px;
      padding-top: 43px;
      padding-bottom: 17px;
      padding-left: 116px;
      padding-right: 116px;
      background-color: #eef2f4;
      text-align: center;
    }
    .packages__list {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      margin-top: 0;
      margin-bottom: 54px;
      padding: 0;
      list-style: none;
      -webkit-box-pack: center;
          -ms-flex-pack: center;
              justify-content: center;
    }
    .packages__package {
      width: 270px;
      margin-right: 60px;
      font-size: 16px;
      line-height: 1.5;
    }
    .packages__package:last-child {
      margin-right: 0;
    }
    .packages__package p {
      position: relative;
      margin-top: 0;
      margin-bottom: 15px;
    }
    .packages__package p:after {
      content: ' ';
      display: block;
      width: 18px;
      height: 1px;
      margin-top: 15px;
      margin-left: auto;
      margin-right: auto;
      background-color: #102938;
    }
    .packages__package p:last-child {
      margin-bottom: 0;
    }
    .packages__package p:last-child:after {
      display: none;
    }
    .packages__type {
      width: 132px;
      height: 50px;
      margin-bottom: 20px;
      margin-left: auto;
      margin-right: auto;
      padding-top: 15px;
      padding-bottom: 15px;
      color: white;
      font-size: 16px;
      font-weight: bold;
      line-height: 1.5;
      text-align: center;
      text-transform: uppercase;
      background-color: #102938;
    }
    .packages__type--premier {
      color: inherit;
      background-color: #76c8b5
    }
    .packages__disclaimer {
      font-size: 16px;
      font-style: italic;
      line-height: 1.5;
    }
    .footer {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      padding-top: 36px;
      padding-bottom: 80px;
      padding-left: 116px;
      padding-right: 116px;
      -webkit-box-pack: center;
          -ms-flex-pack: center;
              justify-content: center;
    }
    .footer__logo {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      width: 165px;
      margin-right: 50px;
    }
    .footer__image {
      width: 100%;
      -ms-flex-item-align: center;
          -ms-grid-row-align: center;
          align-self: center;
    }
    .footer__copy {
      width: 586px;
      margin: 0;
      font-size: 19px;
      line-height: 1.47;
    }
    @media print {
      body {
        max-width: 8.5in;
        max-height: 11in;
      }
      .page {
        margin-top: 0;
      }
    }
  </style>
</head>
<body>
  <main class="page">
    <div class="top">
      <h1>ERISA BONDS are a necessity for your plan, but that’s just the beginning.</h1>
      <div class="columns">
        <div class="column">
          <p>The U.S. DOL requires your retirement plan to obtain an ERISA Bond. The bond must equal 10% of the total plan assets, with a minimum value of $1,000 and a maximum value of $500,000. Learn about ERISA bonds at <a href="/erisa?ref=<?php echo $ref ?>">colonialsurety.com/erisa?ref=<?php echo $ref ?></a></p>

          <p>Our partner, <strong>Colonial Surety</strong> is an easy choice for your ERISA bond—you can quote and purchase online in minutes. They also offer unique packages to protect you personally with Fiduciary Liability Insurance and free Cyber Liability Insurance that covers your plan and your business.</p>
        </div>
        <div class="column">
          <div class="callout">
            <p>67% of small & medium sized businesses reported a cyber attack in 2018 according to a Verizon report.</p>
            <cite>2019 Verizon Data Breach Investigation Report.</cite>
          </div>
        </div>
      </div>
      <div class="top__copy">
        <p>
          <strong>Fiduciary Liability Insurance</strong><br />
          Provides protection from personal liability against actual and alleged fiduciary breaches.<br />
          <em>Available on all ERISA bond packages.</em>
        </p>
  
        <p>
          <strong>Cyber Liability Insurance (FREE with package plan)</strong><br />
          Manage data breaches while minimizing liability with assistance at every stage of incident investigation. It safeguards your plan and company against a loss due to an actual cyber attack and an alleged or actual fiduciary breach. <em>Only available on 2 and 3 year ERISA bond packages.</em>
        </p>
      </div>
    </div>
    <div class="packages">
      <h2>ERISA Packages</h2>
      <ul class="packages__list">
        <li class="packages__package">
          <h3 class="packages__type">Basic</h3>
          <p>1-Year ERISA Bond</p>
          <p>Fiduciary Liability<br />Insurance</p>
          <p>Discounted Premium</p>
        </li>
        <li class="packages__package">
          <h3 class="packages__type">Plus</h3>
          <p>Locked-In 2-Year Bond Rate with<br />Extended Coverage<sup>*</sup></p>
          <p>Fiduciary Liability<br />Insurance &amp; Cyber</p>
          <p>Additional Discount</p>
        </li>
        <li class="packages__package">
          <h3 class="packages__type packages__type--premier">Premier</h3>
          <p>Locked-In 3-Year Bond Rate with<br />Extended Coverage<sup>*</sup></p>
          <p>Fiduciary Liability<br />Insurance &amp; Cyber</p>
          <p>Greatest Discount</p>
        </li>
      </ul>
      <div class="packages__disclaimer">*Extended coverage insures your bond remains U.S. DOL compliant for any increase in plan assets.</div>
    </div>
    <div class="footer">
      <div class="footer__logo">
        <img src="/wp-content/themes/colonialsurety/images/colonial-logo.svg" alt="Colonial Surety" title="Colonial Surety" class="footer__image">
      </div>
      <p class="footer__copy">Visit <a href="https://quote.colonialsurety.com/erisa_quote?ref=<?php echo $ref ?>">quote.colonialsurety.com/erisa_quote?ref=<?php echo $ref ?></a> to get an online quote today or talk to an ERISA bond expert <a href="tel:8883833313">888-383-3313</a>.</p>
    </div>
  </main>
  <script>
    window.addEventListener("load", function() {
      setTimeout(function(){
        window.print();
      });
    });
  </script>
</body>
</html>