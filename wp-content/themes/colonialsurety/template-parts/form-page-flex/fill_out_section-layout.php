<div class="article__wrapper wrapper">
    <section id="dwnloadFrms" class="grayBox">
        <h2>You can also fill out a claim form and send it to us.</h2>
        <div class="container">
            <?php if (have_rows('form_links')): ?>
            <div id= "pdfs" class="half">

                <div class="table">
                    <?php while (have_rows('form_links')): the_row();
                        $link = get_sub_field("form_link");
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            echo "<div class='halfWidth'><a class='link' href=" . $link_url . " target=" . $link_target . ">" . $link_title . "</a></div>";
                        endif;
                    endwhile;
                    endif; ?>
                </div>
            </div>
            <hr>
            <?php $contact = get_sub_field("contact_info");
            if ($contact): ?>
                <div id="contactHalf" class="half">
                    <table>
                        <tr>
                            <td class="titleCol">Email:</td>
                            <td class="hideIpad">
                                <a class="link" href='mailto:"<?php echo $contact['email_address']?>"'><?php echo $contact['email_address']?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="titleCol">Fax:</td>
                            <td class="hideIpad"><?php echo $contact['fax']?></td>
                        </tr>

                        <tr>
                            <td class="titleCol">Mail:</td>
                            <td class="hideIpad"><?php echo $contact['mail_address']?></td>
                        </tr>

                    </table>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>