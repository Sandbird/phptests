<!DOCTYPE html>

<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>

    <meta charset="utf-8"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

    <style type="text/css">
        .ff_temp * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .ff_temp .line,
        .ff_temp .line:last-child,
        .ff_temp .last_unit {
            overflow: hidden;
        }

        .ff_temp .unit {
            float: left;
            position: relative;
        }

        .ff_temp .unit_right {
            float: right;
        }

        .ff_temp .size1of1 {
            float: none;
        }

        .ff_temp .size1of2 {
            width: 50%;
        }

        .ff_temp .size1of3 {
            width: 33.33333%;
        }

        .ff_temp .size2of3 {
            width: 66.66666%;
        }

        .ff_temp .size1of4 {
            width: 25%;
        }

        .ff_temp .size3of4 {
            width: 75%;
        }

        .ff_temp .line:last-child,
        .ff_temp .last_unit {
            float: none;
            width: auto;
        }

        .ff_temp p,
        .ff_temp h1,
        .ff_temp h2,
        .ff_temp h3,
        .ff_temp h4,
        .ff_temp h5,
        .ff_temp h6 {
            margin-top: 0;
        }

        .ff_temp .required_item {
            margin-left: 4px;
            color: red;
        }

        .ff_temp textarea,
        .ff_temp input[type="text"],
        .ff_temp input[type="email"],
        .ff_temp input[type="url"],
        .ff_temp input[type="number"],
        .ff_temp input[type="password"],
        .ff_temp input[type="tel"],
        .ff_temp input[type="date"],
        .ff_temp input[type="search"] {
            width: 75%;
            margin-bottom: 0;
            height: 32px;
            line-height: 32px;
        }

        .ff_temp input[type="text"].friend_input {
            width: 70%;
        }

        .ff_temp ul.dynamic_recipients {
            list-style: none;
            padding: 0;
        }

        .ff_temp .field_label {
            font-weight: bold;
        }

        .image_upload .ff_temp label.error, .ff_temp label.error {
            margin-top: 4px;
        }

        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
            font-size: 12px;
        }

        /* IE 6 doesn't support max-height
         * we use height instead, but this forces the menu to always be this tall
         */
        * html .ui-autocomplete {
            height: 200px;
        }

        .project-label {
            display: block;
            font-weight: bold;
            margin-bottom: 1em;
        }

        .project-icon {
            float: left;
            height: 32px;
            width: 32px;
        }

        .project-description {
            margin: 0;
            padding: 0;
        }
        .small_list_image {
            width: 16px;
            height: 16px;
            margin-right: 4px;
        }
        input[type="text"].has_chosen {
            border-color: #FFF;
            background: #FFF;
            box-shadow: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -o-box-shadow: none;
            font-weight: bold;
            border-style: solid;
        }
        .js_remove {
            position: absolute;
            right: 0;
            top: 10px;
            padding: 0 10px;
            border: 1px solid #CCC;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            display: none;
            height: 32px;
            line-height: 32px;
        }
        .ui-helper-hidden-accessible { position: absolute; left: -9999px; }
    </style>

</head>
<body>

<div class="ff_temp">
    <div class="line">
        <?php for($i = 0; $i <= 2; $i++){ ?>
        <div class="unit size1of1" id="choose_friend_container_<?php echo $i; ?>">
            <img id="friend<?php echo $i; ?>-icon" src="images/empty-image.gif" data-blank-image-src="images/empty-image.gif" class="ui-state-default" alt=""
                 style="width: 32px; height: 32px; float: left; margin-right: 6px;">
            <input id="friend<?php echo $i; ?>" type="text" class="friend_input">
            <input type="hidden" id="friend<?php echo $i; ?>-id">
            <a href="#" class="js_remove" data-input-id="friend<?php echo $i; ?>">Remove</a>
        </div>
        <?php } ?>
    </div>
</div>


<h2>Chosen Friends <span class="cnt_chosen_friends"></span></h2>
<div class="chosen_friends"></div>

<h2>Friends <span class="cnt_friends"></span></h2>
<div class="friends"></div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>

    /**
    * Variables
    */
     var friends = [{"value":"alexander.amory","label":"Alexander Amory","desc":"514505593","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-prn2\/c7.0.62.62\/s32x32\/1460253_10153484961480594_1156825768_t.jpg"},{"value":"emma.lynch.50702","label":"Emma Lynch","desc":"527702336","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-prn2\/s32x32\/1376983_10151668936082337_1778059618_t.jpg"},{"value":"dedgar","label":"David Edgar","desc":"586215238","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-prn2\/c0.0.160.160\/p160x160\/187691_586215238_911924475_n.jpg"},{"value":"legendtoomey","label":"Craig Toomey","desc":"650030415","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-prn2\/c5.5.65.65\/s32x32\/9972_10152875166025416_2028984750_t.jpg"},{"value":"aba.eccles","label":"Aba Eccles","desc":"661254739","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash3\/c0.13.75.75\/s32x32\/2803_90750184739_5432454_t.jpg"},{"value":"nick.burke.148","label":"Nick Burke","desc":"673037813","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash1\/c10.0.56.56\/s32x32\/224396_10150249908942814_390055_t.jpg"},{"value":"mrdanieloliver","label":"Daniel Oliver","desc":"692762323","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash2\/s32x32\/1384112_10151978408412324_694875330_t.jpg"},{"value":"poosie","label":"Poosie Murdoch-Amory","desc":"744249656","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-prn1\/c5.5.65.65\/s32x32\/644278_10151874377599657_398388549_t.jpg"},{"value":"kevinmichaelbarton","label":"Kevin Barton","desc":"755440075","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash2\/c5.5.65.65\/s32x32\/1234541_10153150973045076_2006022213_t.jpg"},{"value":"catie.watts","label":"Catie Murdoch","desc":"1193756525","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-frc3\/c13.0.49.49\/s32x32\/1001826_10201456243066684_2086573140_t.jpg"},{"value":"alex.murdoch.7739","label":"Alex Murdoch","desc":"1266108564","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-prn2\/s32x32\/8726_1241049747470_6064571_t.jpg"},{"value":"susan.lynch.167","label":"Susan Lynch","desc":"1266633397","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash3\/c19.0.56.56\/s32x32\/563100_10202157451118877_602004701_t.jpg"},{"value":"yvette.watts.3","label":"Yvette Watts","desc":"1316743516","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-frc3\/c13.4.49.49\/s32x32\/419219_3243981301195_1746205632_t.jpg"},{"value":"debby.ashton1","label":"Debby Ashton","desc":"100000056265848","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-frc3\/c0.0.75.75\/s32x32\/1452384_699996383345564_800867441_t.jpg"},{"value":"steve.watts.92","label":"Steve Watts","desc":"100000918090413","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash2\/c2.0.72.72\/s32x32\/1450801_665356416838289_1130581248_t.jpg"},{"value":"patrick.lynch.737","label":"Patrick Lynch","desc":"100001288201998","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-frc3\/c13.4.49.49\/s32x32\/970260_549920221727580_1728100319_t.jpg"},{"value":"jasmine.watts.969","label":"Jasmine Watts","desc":"100001608525182","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-frc3\/c5.5.65.65\/s32x32\/560672_423623191034628_1533983246_t.jpg"},{"value":"poppy.f.watts","label":"Poppy Frankie Watts","desc":"100001623048819","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash2\/c16.4.44.44\/s32x32\/182742_141635152567252_4918329_t.jpg"},{"value":"virginiemoreaucuttaia","label":"Virginie Moreau","desc":"100001968423194","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash2\/c0.0.75.75\/s32x32\/1453533_543328799076063_484103523_t.jpg"},{"value":"jonathan.amory.3","label":"Jonathan Amory","desc":"100002195768576","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash2\/c5.5.65.65\/s32x32\/249438_122937124456146_202267_t.jpg"},{"value":"si.wellstead","label":"Si Wellstead","desc":"100003302003185","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash2\/c5.5.65.65\/s32x32\/539483_269823589804372_555655323_t.jpg"},{"value":"gillian.lynch.3950","label":"Gillian Lynch","desc":"100003958963073","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-ash2\/c15.4.46.46\/s32x32\/527816_108165449325420_857395374_t.jpg"},{"value":"etis.bew.12","label":"Etis Bew","desc":"100004762657071","icon":"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-prn2\/c0.0.75.75\/s32x32\/1455011_237504036418350_1213463085_t.jpg"}],
        chosen_friends = [];


    // List User's Friends
    $( ".friend_input" ).autocomplete({
        minLength: 0,
        source: friends,
        messages: {
            noResults: '',
            results: function() {}
        },
        focus: function( event, ui ) {
            $(this).val( ui.item.label );
            return false;
        },
        select: function( event, ui ) {
            $(this).val( ui.item.label).addClass("has_chosen").attr('disabled', 'disabled').siblings('.js_remove').show();
            $(this).next('input[type=hidden]').val( ui.item.value );
            $(this).parent('div').children('img').attr( "src", ui.item.icon );
            return false;
        }
    })
    // End List User's Friends

    /**
     * EVENTS
    */
    // Remove chosen friend
    $(".js_remove").on('click', function(){
        var input_id = $(this).data('input-id');

        // Get index of object to remove
        for (i = 0; i < chosen_friends.length; i++) {
            if ( chosen_friends[i].value === $("#" + input_id + "-id").val() ) {
                // remove from chosen friends array
                removed = chosen_friends.splice(i, 1);
                $('.chosen_friends').html('<pre>' + JSON.stringify(chosen_friends, undefined, 2) + '</pre>');
            }
        }

        // Add back
        friends.push(removed[0]);

        // HTML
        $('.friends').html('<pre>' + JSON.stringify(friends, undefined, 2) + '</pre>');
        $('.cnt_chosen_friends').html(chosen_friends.length);
        $('.cnt_friends').html(friends.length);

        // Re-assign the source
        $(".friend_input").autocomplete("option","source",friends);

        // Clear data
        $("#" + input_id).val("").removeClass('has_chosen').removeAttr('disabled');
        $("#" + input_id + "-id").val("");
        $("#" + input_id + "-icon").attr("src", $("#" + input_id + "-icon").attr("data-blank-image-src"));
        $(this).hide();

        return  false;
    })

    // Init dropdown list when focused
    $( ".friend_input").on('focus', function(){
        $(this).autocomplete( "search", "" );
    });

    // remove chosen from original friends list
    // And add to a chosen_friends list.
    $(".friend_input").on("autocompleteselect", function (event, ui) {

        // Remove the element and overwrite the friends array
        // so that when choosing others friends the chosen don't appear
        chosen = friends.splice(friends.indexOf(ui.item),1);

        // Assign to chosen_friends
        chosen_friends.push(chosen[0]);

        // HTML
        $('.chosen_friends').html('<pre>' + JSON.stringify(chosen_friends, undefined, 2) + '</pre>');
        $('.friends').html('<pre>' + JSON.stringify(friends, undefined, 2) + '</pre>');
        $('.cnt_chosen_friends').html(chosen_friends.length);
        $('.cnt_friends').html(friends.length);

        // Re-assign the source
        $(this).autocomplete("option","source",friends);

    });
</script>
</body>
</html>
