<script type="text/javascript">
document.getElementById("formid").submit(); // Here formid is the id of your form
                           ^
</script>





   $.post('/foo.php', { key1: 'value1', key2: 'value2' }, function(result) {
    alert('successfully posted key1=value1&key2=value2 to foo.php');
});