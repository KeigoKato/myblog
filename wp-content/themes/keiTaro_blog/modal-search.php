<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">キーワードで記事を検索できます</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" id="recipient-name" placeholder="キーワードを入力してください..." value="<?php echo get_search_query(); ?>" name="s" id="s">
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>