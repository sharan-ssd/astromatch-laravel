@extends('frontend.template')

@section('content')
<main class="float-start w-100 body-main">
  <section class="konow-more-zoidc d-inline-block w-100" style="background-color:white;">
    <div class="container" style="overflow-x:hidden;">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
          <button name="btnDownload" class="btn btn-mat report-btns" onclick="downloadReport();">
            <i class="fa fa-download"></i> Download </button>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <button name="btnSendMail" class="btn btn-mat report-btns" onclick="sendMail();">
            <i class="fa fa-envelope"></i> Send Mail </button>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <button name="btnSendWhatsApp" class="btn btn-mat report-btns" onclick="sendWhatsApp();">
            <i class="fab fa-whatsapp"></i> Send in WhatsApp </button>
        </div>
      </div>

      <div style="color:darkblue;font-weight:bold;text-align:center;font-size:x-large;">Marriage Match Making</div>
      <br />
      <div style="display:flex;justify-content:space-around;">
        <div style='width: 45%;float:left;margin-right:10px;border:2px solid #02a698;border-radius:15px;'>
          <table cellpadding='5'
            style='vertical-align: middle;color:darkblue;border-collapse: collapse;font-weight:bold;width:100%;text-align:center;'>
            <tr>
              <td style='text-wrap:pretty;'>asf</td>
            </tr>
            <tr>
              <td>Male</td>
            </tr>
            <tr>
              <td>04/06/2021, 03:03 AM</td>
            </tr>
            <tr>
              <td>Asdas<br /> Ma’rib<br /> Yemen</td>
            </tr>
            <tr>
              <td>Uttara Bhādrapadā - Pisces</td>
            </tr>
            <tr>
              <td>Lagna : Aries</td>
            </tr>
          </table>
        </div>
        <div style='width: 45%;float:left;margin-left:10px;border:2px solid #02a698;border-radius:15px;'>
          <table cellpadding='5'
            style='vertical-align: middle;color:darkblue;border-collapse: collapse;font-weight:bold;width:100%;text-align:center;'>
            <tr>
              <td>asdfa</td>
            </tr>
            <tr>
              <td>Female</td>
            </tr>
            <tr>
              <td>03/02/2023, 01:00 AM</td>
            </tr>
            <tr>
              <td>Asdas<br /> Ma’rib<br /> Yemen</td>
            </tr>
            <tr>
              <td>Ardra - Gemini</td>
            </tr>
            <tr>
              <td>Lagna : Scorpio</td>
            </tr>
          </table>
        </div>
      </div>
      <div
        style='width:100%;margin-top:20px;border-top:2px solid #02a698;border-left:2px solid #02a698;border-right:2px solid #02a698;border-bottom:2px solid #02a698;text-align:center;font-size:22px;color:darkgreen;font-weight:bold;'>
        Standard Match</div>
      <div
        style='text-align:center;margin-top:0px;border-left:2px solid #02a698;border-right:2px solid #02a698;width:100%;'>
        <table
          style='border-collapse: collapse;color:maroon;font-weight:bold;width:99%;white-space:normal;font-size:1.5rem;text-align:center;'>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Dhina Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>0%</td>
            <td style='border-bottom: 1px solid #cccccc;'>No Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Gana Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>90%</td>
            <td style='border-bottom: 1px solid #cccccc;'>Best Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Mahendra Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>0%</td>
            <td style='border-bottom: 1px solid #cccccc;'>No Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Sthree Dheerga Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>100%</td>
            <td style='border-bottom: 1px solid #cccccc;'>Perfect Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Yoni Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>50%</td>
            <td style='border-bottom: 1px solid #cccccc;'>Average Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Rasi Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>70%</td>
            <td style='border-bottom: 1px solid #cccccc;'>Good Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Rasi Lord Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>0%</td>
            <td style='border-bottom: 1px solid #cccccc;'>No Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Vasiya Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>0%</td>
            <td style='border-bottom: 1px solid #cccccc;'>No Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Rajju Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>60%</td>
            <td style='border-bottom: 1px solid #cccccc;'>Above Average Match</td>
          </tr>
          <tr>
            <td style='border-bottom: 1px solid #cccccc;'>Vedhai Match</td>
            <td style='border-bottom: 1px solid #cccccc;'>100%</td>
            <td style='border-bottom: 1px solid #cccccc;'>Perfect Match</td>
          </tr>
        </table>
      </div>
      <div
        style='width:100%;margin-top:0px;border-top:2px solid #02a698;border-left:2px solid #02a698;border-right:2px solid #02a698;border-bottom:2px solid #02a698;text-align:center;color:deeppink;font-size:18px;font-weight:bold;padding-top:5px;'>
        Standard Match Percentage : <span style='color:deeppink;font-size:24px;'>47%</span><br /></div><br />
      <div style="float:left;width:100%;">
        <div style="display:flex;margin-top:20px;justify-content:space-around;flex-wrap:wrap;">
          <div style="margin-bottom:10px;">
            <table id="mainrasichart" style="border-collapse: collapse;font-weight:bold;height:450px;">
              <tr>
                <td id="b12"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Moon</span>
                </td>
                <td id="b1"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Ascendant</span>
                </td>
                <td id="b2"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fd52fd;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Sun</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mercury</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Rahu</span>
                </td>
                <td id="b3"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fd5353;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Venus</span>
                </td>
              </tr>
              <tr>
                <td id="b11"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#ffeb3b;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Jupiter</span>
                </td>
                <td colspan="2" rowspan="2"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">
                  Male<br />Rasi Chart</td>
                <td id="b4"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mars</span>
                </td>
              </tr>
              <tr>
                <td id="b10"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Saturn</span>
                </td>
                <td id="b5"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                </td>
              </tr>
              <tr>
                <td id="b9"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                </td>
                <td id="b8"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Kethu</span>
                </td>
                <td id="b7"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                </td>
                <td id="b6"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                </td>
              </tr>
            </table>
          </div>
          <div>
            <table id="alliancerasichart" style="border-collapse: collapse;font-weight:bold;height:450px;width:100%;">
              <tr>
                <td id="b12"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Jupiter</span>
                </td>
                <td id="b1"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Rahu</span>
                </td>
                <td id="b2"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mars</span>
                </td>
                <td id="b3"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Moon</span>
                </td>
              </tr>
              <tr>
                <td id="b11"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Venus</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Saturn</span>
                </td>
                <td colspan="2" rowspan="2"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">
                  Female<br />Rasi Chart</td>
                <td id="b4"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                </td>
              </tr>
              <tr>
                <td id="b10"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fd5353;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Sun</span>
                </td>
                <td id="b5"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                </td>
              </tr>
              <tr>
                <td id="b9"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fd52fd;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mercury</span>
                </td>
                <td id="b8"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Ascendant</span>
                </td>
                <td id="b7"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Kethu</span>
                </td>
                <td id="b6"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden; background-color:#ffeb3b;color: darkblue;">
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-12 text-center"><img src="img/houses.png"
          style="object-fit: cover;padding-top:50px;padding-bottom:40px;" /></div>
      <div style="float:left;width:100%;">
        <div style="display:flex;margin-top:10px;justify-content:space-around;flex-wrap:wrap;">
          <div style="margin-bottom:10px;">
            <table id="mainnavamsachart"
              style="border-collapse: collapse;font-weight:bold;height:450px;font-size: 14px;font-family: maiandra gd;">
              <tr>
                <td id="b12"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                </td>
                <td id="b1"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                </td>
                <td id="b2"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#ffeb3b;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Rahu</span>
                </td>
                <td id="b3"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Sun</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Saturn</span>
                </td>
              </tr>
              <tr>
                <td id="b11"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                </td>
                <td colspan="2" rowspan="2"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">
                  Male<br />Navamsa Chart</td>
                <td id="b4"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Ascendant</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mars</span>
                </td>
              </tr>
              <tr>
                <td id="b10"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                </td>
                <td id="b5"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fd52fd;color: white;">
                </td>
              </tr>
              <tr>
                <td id="b9"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Jupiter</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Venus</span>
                </td>
                <td id="b8"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Kethu</span>
                </td>
                <td id="b7"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                </td>
                <td id="b6"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: bluefont-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fd5353;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Moon</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mercury</span>
                </td>
              </tr>
            </table>
          </div>
          <div>
            <table id="alliancenavamsachart"
              style="border-collapse: collapse;font-weight:bold;height:450px;width:100%;">
              <tr>
                <td id="b12"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Moon</span>
                </td>
                <td id="b1"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                </td>
                <td id="b2"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#ffeb3b;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mars</span>
                </td>
                <td id="b3"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Sun</span>
                </td>
              </tr>
              <tr>
                <td id="b11"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Venus</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Kethu</span>
                </td>
                <td colspan="2" rowspan="2"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 100px;width: 100px;color: blue;font-size: 14px;word-wrap: break-word;overflow: hidden;">
                  Female<br />Navamsa Chart</td>
                <td id="b4"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Ascendant</span>
                </td>
              </tr>
              <tr>
                <td id="b10"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                </td>
                <td id="b5"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fd52fd;color: white;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Rahu</span>
                </td>
              </tr>
              <tr>
                <td id="b9"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fb3535;color: white;">
                </td>
                <td id="b8"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#c0ff00;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Mercury</span>
                </td>
                <td id="b7"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#09edbffa;color: darkblue;">
                  <span style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Jupiter</span><span
                    style='float:left;width:100%;padding: 0;margin: 0;line-height: 16px;'>Saturn</span>
                </td>
                <td id="b6"
                  style="background-color: white;border: 1px solid black;text-align: center;padding: 10px;height: 110px;width: 110px;max-height: auto;max-width: auto;color: blue;font-size: 14px;font-weight: bold;word-wrap: break-word;overflow: hidden; background-color:#fd5353;color: white;">
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <p class="mb-4">Dear user, do you know? Based on birth star <span
          style='color:red; font-weight:bold;  font-style: italic;'>That experienced astrologers give <u>only 20%
            importance</u></span> to these ten matches?</p>

      <p class="mb-4"><span style='color: maroon; font-weight:bold;'>This is why even if you send your horoscope
          based on this ten matching method, many times it is rejected by the groom's family as not suitable.</span>
      </p>

      <p class="mb-4">Based on our survey of over 150 marriage matching astrologers over the past 2 years,</p>

      <p class="mb-4">Beyond these ten matches, software-based the various prediction methods they use to make the
        final decision.</p>

      <p class="mb-4"><span style='color:#0EC4E8; font-weight:bold; font-style: italic;'><u>With over 80%
            accuracy</u></span>, our exclusive invention <span style='color:blue; font-weight:bold;'>Vihaga Yoga
          Pattathi (VYP) matching-method</span> by looking for matching,</p>

      <p class="mb-4">Find your perfect life partner fast - get our most accurate high-quality marriage match
        report, <span style='font-weight:bold;font-style: italic;'>now at a discounted price!</span></p>
      <div class="pricing-table table-1">
        <div class="ptable-item featured-item">
          <div class="ptable-single">
            <div class="ptable-header">
              <a
                href="horoscopeConfirmation.php?mainProfileId=11115&allianceProfileId=11116&decisionID1=8653&decisionID2=8654&matchMethod=complete&matchID=1774">
                <div class="ptable-title">
                  <h2>See The Exact Match</h2>
                </div>
                <div class="ptable-price">
                  <h2><small>₹</small>599 <span class="strikethrough">₹1,000</span><span> <span> + GST</span></h2>
                  <span class="price-note"><i>per Report</i></span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <h3>Here, It's for you:</h3>

      <p class="mb-4">📝 What's included in the report?</p>
      <div class="content-section">
        <span class="underline"></span>
        <span class="short-underline"></span>
      </div>
      <p class="mb-4">
      <ul style='list-style-type: none;'>
        <li>✅ <b>15 pages for you</b> – Simple, clear compatibility analysis (emotional, psychological, spiritual,
          and astrological).</li>
        <li>✅ <b>15 pages for your astrologer</b> – Advanced technical calculations using our exclusive Vivaha Yoga
          Pathi (VYP) system.</li>
        <li>✅ <b>Your personal relationship strengths and weaknesses</b> – So you know exactly what to expect.</li>
        <li>✅ <b>Spiritual and psychological solutions</b> – Personalized remedies to enhance your bond and overcome
          challenges.</li>
        <li>✅ <b>Exclusive Astro Music Therapy</b> – Special raga-based mantras to neutralize planetary imbalances.
        </li>
      </ul>
      <p>This is not just another basic horoscope matching.<br>
        It is a deep, scientific marriage compatibility analysis trusted by astrologers and spiritual seekers
        worldwide.</p>
      </p>

      <h3></h3><iframe src="New Alliance Match Making Report.pdf" width="100%" height="750px"
        style="border: none;"></iframe>
      <div class="mt-3">
        <h3>What happens if you ignore this?</h3>
        <p class="mb-4">
        <ul style='list-style-type: none;'>
          <li>⏳ <b>You may unknowingly choose an incompatible partner, leading to years of struggle.</b></li>
          <li>⏳ <b>Wrong compatibility can lead to emotional pain, stress, and separation.</b></li>
          <li>⏳ <b>Missed opportunities – Your perfect match may slip away if you don’t check deep
              compatibility.</b></li>
          <li>⏳ <b>Karmic mismatches can create lifelong challenges that could have been avoided.</b></li>
        </ul>
        <p>Why take a chance when you can make an informed decision?<br>
          Introducing the most advanced 30-page personalized marriage compatibility report!</p>
        </p>

        <div class="macth-payment">
          <a href="horoscopeConfirmation.php?mainProfileId=11115&allianceProfileId=11116&decisionID1=8653&decisionID2=8654&matchMethod=complete&matchID=1774"
            class="btn btn-mat mb-1 mt-3 btn-sm">Instantly, See The Exact Match!</a>
          <span class="buynow-note"><b>Note</b>: Click this button to buy this package</span>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Modal -->
<div class="modal fade" id="modalCenter">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <i>
          <h5 class="modal-title" id="lblAlert" style="font-weight: bold"></h5>
        </i>
        <div class="col-md">
          <div class="demo-inline-spacing">
            <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  localStorage.removeItem("submittedOnce");

  function downloadReport() {
    document.getElementById('lblAlert').innerText = "PDF is downloading";
    window.location.href = "downloadReport.php?decisionId=8653&mainProfileId=11115&allianceProfileId=11116&matchmethod=10point&language=en";
    setTimeout(function() {
       hidePopup();
      },2000);
  }
  function sendMail() {
    document.getElementById('lblAlert').innerText = "Sending EMail (You will receive mail within 5mins)";
    showPopup();
    let mainProfileId = "11115";
    let allianceProfileId = "11116";
    let decisionId = "8653";
    let matchmethod = "10point";
    let language = "en";
    $.ajax({
      url: 'sendMarriageReportMail.php',
      type: 'POST',
      dataType: 'text',
      data: "mainProfileId=" + mainProfileId + "&allianceProfileId=" + allianceProfileId + "&decisionId=" + decisionId + "&matchmethod=" + matchmethod + "&language=" + language,
      success: function (data) {
        if(data != "")
          hidePopup();
        else
          document.getElementById('lblAlert').innerText = data;
      }
    });
  }
  function sendWhatsApp() {
    document.getElementById('lblAlert').innerText = "Sending to WhatsApp";
    showPopup();
    let mainProfileId = "11115";
    let allianceProfileId = "11116";
    let decisionId = "8653";
    let matchmethod = "10point";
    let language = "en";
    $.ajax({
      url: 'sendMarriageReportWhatsApp.php',
      type: 'POST',
      dataType: 'text',
      data: "mainProfileId=" + mainProfileId + "&allianceProfileId=" + allianceProfileId + "&decisionId=" + decisionId + "&matchmethod=" + matchmethod + "&language=" + language,
      success: function (data) {
        if(data != "")
          hidePopup();
        else
          document.getElementById('lblAlert').innerText = data;
      }
    });
  }
  function showPopup()
  {
    $('#modalCenter').modal('show');
  }
  function hidePopup()
  {
    $('#modalCenter').modal('hide');
  }
</script>
<style>
  ul.cms-links {
    margin: 0;
    padding-left: 10px;
  }

  ul.cms-links li {
    font-size: 16px;
    list-style-type: circle;
    padding: 0;
    margin: 0px;
    color: #000;
  }

  ul.cms-links li a {
    color: #000;
  }

  .socialmedia-icons-footer {
    float: right;
    position: relative;
    top: 10px;
    left: 0;
    text-align: left;
  }
</style>
@endsection