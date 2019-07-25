<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>

    <body style="background: #efefef;">

       <table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: 'Montserrat', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->
    <thead>
        <tr>
            <td style="background: #fff; padding: 16px 0px;">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <td style="vertical-align: middle; padding-left: 20px;"><a href="#" style="border: none; float: left; outline: none;"><img alt="" src="{{ getConfigValue('home_logo') }}" style="width: 150px;display: block; border: none; outline: none;" /></a>
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                         
                        </td>
                        <td style="text-align: right; vertical-align:middle; padding-right: 20px;"><a href="mailto:{{ getConfigValue('contact_email') }}" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">{{ getConfigValue('contact_email') }}</a></td>
                    </tr>
                </tbody>
            </table>
            </td>
        </tr>
    </thead>
    <!--*--><!--*-->
    <tbody>
        <tr>
            <td style="background: #fff2f4; padding: 56px 0 52px;">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; width: 470px; padding-left: 70px; padding-right: 70px;">
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Mistri Mama Contact Form</td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0px 0px;">
                                    <table cellpadding="0" cellspacing="0" style="text-align: left;  width: auto;" width="">
                                        <tbody>
                                            <tr>
                                                <td>
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-size: 14px; line-height: 1; color: #000; text-transform: capitalize; padding-bottom: 20px;">Contact Form</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 22px;">
                                                <table cellpadding="0" cellspacing="0" style="height: 3px;" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 46px; vertical-align: middle; height: 3px; font-size: 0;line-height: 0;">
                    <img src="https://redflagdata.com.au/photos/1/colorline.png" style="border: none; outline: none; width: 100%; height: 3px;" /></td>
                                                            <td style="vertical-align: middle; height: 3px;  font-size: 0;line-height: 0;">
                                                                
                                                                <img src="https://redflagdata.com.au/photos/1/line.png" style="border: none; outline: none; width: 100%; height: 1px;" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; line-height: 1; color: #000;">
                                                <table cellpadding="0" cellspacing="0" style="height: 3px;" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:194px; padding-bottom:17px; vertical-align:middle;">NAME:</td>
                                                            <td style="padding-bottom:17px; vertical-align:middle;">{{ $name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:194px; padding-bottom:17px; vertical-align:middle;">&nbsp;EMAIL:</td>
                                                            <td style="padding-bottom:17px; vertical-align:middle;">{{ $email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:194px; padding-bottom:17px; vertical-align:middle;">PHONE:</td>
                                                            <td style="padding-bottom:17px; vertical-align:middle;">{{ $phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:194px; padding-bottom:17px; vertical-align:middle;">YOUR MESSAGE:</td>
                                                            <td style="padding-bottom:17px; vertical-align:middle; line-height: 1.4"><?php echo  ($text) ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                </tbody>
            </table>
            </td>
        </tr>
    </tbody>
    <!--*--><!--*-->
    <tfoot>
        <tr>
            <td style="padding: 35px 0 42px;">
            <table cellpadding="0" cellspacing="0" width="100%">
                 
            </table>
            </td>
        </tr>
    </tfoot>
    <!--*-->
</table>


    </body>
</html>
