function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}
$(function(){
	
	$("form").on("submit",function(e){
		e.preventDefault();
		//prepare the request
		var request = gapi.client.youtube.search.list({
			part: "snippet",
			type: "video",
			q: encodeURIComponent($('#search').val()+' new').replace(/%20/g, "+"),
			maxResults: 5,
			order: "viewcount",
			publishedAfter: "2015-01-01T00:00:00Z"
		});
		 //execute the result
		 request.execute(function( response)
		 {
			var results=response.result;
			$.each(results.items,function(index,item)
			{
				
				$.get("item.html",function(data)
				{
					$('#results').append(tplawesome(data, [{"title":item.snippet.title,"videoid":item.id.videoId}]));
				}); 
				//console,log(item)
			});
		 });
	});
});

function init()
{
	gapi.client.setApiKey("AIzaSyAGBrtIOt0A9mE0ssSvH8PpR1lL6Y2xHL0");
	gapi.client.load("youtube","v3",function(){
		//yt tube is ready
	});
	
	
}