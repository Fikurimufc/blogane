<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.pagination a', function(e){
			get_page($(this).attr('href').split('page=')[1]);
			e.preventDefault();
		});
	});

	function get_page(page){
		$.ajax({
			url : '/article?page='+page,
			type: 'GET',
			dataType : 'json',
			success : function(data){
				$('#articles-list').html(data['view']);
			},error : function(xhr, status, error){
				console.log(error);
			},
			complete: function(){
				alreadyloading = false;
			}

		});
	}
</script>