<?php
    $page_ID = 2;
    require("assets/header.php");
?>
</head>
    <body>
        <?php
            $pageBgImg = $fun_obj->commonSelect_table("cms_gallery","page_id^img_order^pagename^small_img","WHERE page_id='$page_ID'");           
            $num_row = mysqli_num_rows($pageBgImg);
            if($num_row > 0){
                $fetchGalery = mysqli_fetch_assoc($pageBgImg);
                $pagename = str_replace(" ", "-", $fetchGalery['pagename']);
                $imgName = $fetchGalery['small_img'];
            }
        ?>
        <section class="homeHeader" style="background-image: url('<?=$imgPath.$pagename."/".$imgName?>')">
            <?php require("assets/navbar.php"); ?>
            <?php require("assets/pilotHeaderCaption.php"); ?>
        </section> 
        <section class="mt-5 mb-5 pt-5 pb-4">
            <div class="container">
                <div class="row">
                    <div class='col-12 text-center'>
                        <?php if($p[0] != "") echo"<p class='w-75 mx-auto'>$p[0]</p>"; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-2 mb-2 pt-4 pb-4">
            <div class="container">
                <div class="row">
                <?php
                    $heading = "";
                    $para = "";

                    $flightCenter = $fun_obj->commonSelect_table("cms_pages", "page_ID^page_name^filename", "WHERE flag=$page_ID");
                    while($flightRun = mysqli_fetch_assoc($flightCenter)){
                        $Fids = $flightRun['page_ID'];
                        $Fpage_name = $flightRun['page_name'];
                        $Ffilename = $flightRun['filename'];

                        $flight_h4 = $fun_obj->TextArray($Fids, "heading");
                        $flight_p = $fun_obj->TextArray($Fids, "p");


                        $FImg = $fun_obj->commonSelect_table("cms_gallery","page_id^img_order^pagename^small_img","WHERE page_id='$Fids'"); 
                        $num_row = mysqli_num_rows($FImg);
                        // if($num_row > 0){
                            $fetchGallery = mysqli_fetch_assoc($FImg);
                            $pagename = strtolower(str_replace(" ", "-", $fetchGallery['pagename']));
                            $imgName = $fetchGallery['small_img'];

                            
                            if($flight_h4[0] != "") $heading = "<h4>".$flight_h4[0]."</h4>";
                            if($flight_p[0] != "") $para = "<p>".$flight_p[0]."</p>";
                         
                        //  if($flight_p[0] != ""){
                        //     $para = "<p>$flight_p[0]</p>";
                        //  }
                            $div = "<div class='col-12 col-lg-6 mb-4'><div class='flightWrap'>";                            
                            $div .= "<div class='flightImg'>";
                            $div .= "<img src='".$imgPath.$pagename."/".$imgName."' alt=''  class='img-fluid w-100' />";
                            $div .= "<div class='flightText w-75'>";
                            $div .=  $heading;
                            $div .= $para;
                            $div .= "<div class='primaryBtnWrap'>";
                            $div .= "<div class='primaryBtnGroup'>";                            
                            $div .= "<a href='".$root.$pagename."' class='primaryBtn'>View Details</a>";
                            $div .= "</div>";
                            $div .= "</div>";
                            $div .= "</div>";
                            $div .= "</div>";
                            $div .= "</div></div>";

                            echo $div;
                        // }
                    }
                ?>
                </div>
            </div>
        </section>
        <?php require("assets/footer.php"); ?>
    </body>
</html>