<?php
$url_encode=urlencode(get_permalink());
$title_encode=urlencode(get_the_title()).'｜'.get_bloginfo('name');
?>
<div class="share">
    <ul>
        <li class="facebook">
            <a href="//www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
                <i class="fab fa-facebook"></i><span> facebook</span>
                <?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'':scc_get_share_facebook(); ?>
            </a>
        </li>
        <li class="tweet">
            <a href="//twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;">
                <i class="fab fa-twitter"></i><span> tweet</span>
                <?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'':scc_get_share_twitter(); ?>
            </a>
        </li>
        <li class="googleplus">
            <a href="//plus.google.com/share?url=<?php echo $url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;">
                <i class="fab fa-google-plus-square"></i><span> Google+</span>
                <?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'':scc_get_share_gplus(); ?>
            </a>
        </li>
        <li class="hatena">
            <a href="//b.hatena.ne.jp/entry/<?php echo $url_encode ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;"><i class="fa fa-hatena"></i><span> はてブ</span>
            <?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':scc_get_share_hatebu(); ?></a>
        </li>
    </ul>
</div>