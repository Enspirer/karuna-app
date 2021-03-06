<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <!-- <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
              <img src="https://assets.codepen.io/210284/h1.png" alt="" width="300" style="height:auto;display:block;" />
            </td> -->
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 30px 0;color:#153643;" align="left">
                    <h1 style="font-size:20px;margin:0 0 20px 0;font-family:Arial,sans-serif;">Karunaa - User Register</h1>
                  </td>
                  <td style="padding:0 0 30px 0;color:#153643;" align="right">
                    <img src="{{url('images/logo/karuna-logo-english.png')}}" style="max-width:100px; margin:0 0 20px 0;">                    
                  </td>
                </tr>
                <tr>
                  <td style="padding:0 0 30px 0;color:#153643;" colspan="2">
                    <p style="color: black; margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Dear {{ $details_user['name'] }},</p>
                    <p style="color: black; margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Thank you for registering with Karunaa.</p>
                    <p style="color: black; margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Please click below to confirm your account.</p>
                    <p style="color: black; margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Regards,</p>
                    <p style="color: black; margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Team Karunaa</p>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0 0 30px 0;color:#153643;" align="center" colspan="2">
                      <a href="{{url('account/confirm',$details_user['confirmation_code'])}}" style="text-decoration: none; display: block; width:fit-content; margin:auto; background: #4E9CAF; padding: 0.5rem 1rem; text-align: center; border-radius: 5px; color: white; font-weight: bold; line-height: 25px;">Confirm Account</a>
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px 0 20px 0;color:#153643;" colspan="2">
                    <p style="color: black; margin:20px 0 12px 0;font-size:12px;line-height:24px;font-family:Arial,sans-serif;">If you???re having trouble clicking the "Confirm Account" button, copy and paste the URL below into your web browser: {{url('account/confirm',$details_user['confirmation_code'])}}</p>
                  </td>
                </tr>

              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:#1FC39E;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="center">
                    <p style="margin:0;font-size:20px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                        Karunaa - User Register &reg;
                    </p>
                  </td>
                  <!-- <td style="padding:0;width:50%;" align="right">
                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                          <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                      </tr>
                    </table>
                  </td> -->
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>