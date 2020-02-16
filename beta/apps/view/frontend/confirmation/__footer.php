<script>
$("#close").on("click",function(e){
	e.preventDefault();
	window.base_url = <?php echo json_encode(redir(base_url())); ?>;
});
</script> 
</body>
</html>

