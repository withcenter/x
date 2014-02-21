/** ajax load
	*/
function ajax_load(href, callback)
{
	$.ajax({
			url: href,
			success: function(re) {
				if (callback && typeof(callback) === "function") {
					callback(re);
				}
			},
			error: function(xhr) {
				////alert('Error! Status = ' + xhr.status + "\r\n\r\nPlease notify this to your manager immediately.");
			}
		});
}
