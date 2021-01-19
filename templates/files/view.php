<a href="index.php#files/manage" class="uk-button uk-button-link uk-icon tm-back"><span uk-icon="icon: chevron-left; "></span>Back</a>

<div class="uk-child-width-expand@s uk-margin-small-top uk-flex-top" uk-grid style="border-bottom: 1px solid #ebebeb;">
    <div>

        <div class="uk-flex uk-flex-wrap ">
            <div class="uk-width-1-1">
                <h2 class="uk-h3"></h2>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div>

    </div>
</div>
<br/>
<br/>

<embed id="pdf_iframe" style="width:100%;height:100vh;" src="" type="application/pdf">
<script>
    var file_name = sessionStorage.getItem('view_file');
    var directory = "file-storage/document/" + file_name;
    $('h2').text(file_name);
    $('embed').attr("src", directory);
</script>