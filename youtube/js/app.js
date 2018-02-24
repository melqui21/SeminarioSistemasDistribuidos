function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}

$(function() {
    $("form").on("submit", function(e) {
       e.preventDefault();
       // prepara la búsqueda
       var request = gapi.client.youtube.search.list({
            part: "snippet",
            type: "video",
            q: encodeURIComponent($("#search").val()).replace(/%20/g, "+"),
            maxResults: 5,
            order: "viewCount",
            publishedAfter: "2015-01-01T00:00:00Z"
       }); 
       // ejecuta la búsqueda
       request.execute(function(response) {
          var results = response.result;
          $("#results").html("");
          $.each(results.items, function(index, item) {
            $.get("tpl/item.php", function(data) {
				var a=item.snippet.title;				
				var n = a.search("fea");
				//document.getElementById("demo").innerHTML = n;
				//a = a.toUpperCase();
				if ((a.search("fea")<0) && (a.search("Fea")<0)){
					$("#results").append(tplawesome(data, [{"color":"black", "title":item.snippet.title, "videoid":item.id.videoId}]));
				}else{
					$("#results").append(tplawesome(data, [{"color":"red","title":item.snippet.title, "videoid":item.id.videoId}]));
				}
			});
          });
          resetVideoHeight();
       });
    });
    
    $(window).on("resize", resetVideoHeight);
});

function resetVideoHeight() {
    $(".video").css("height", $("#results").width() * 9/16);
}

function init() {
    gapi.client.setApiKey("AIzaSyDhlZGponfvencOyjt-_oAV3B0ZFMzaRmo");
    gapi.client.load("youtube", "v3", function() {
        // yt api is ready
    });
}
