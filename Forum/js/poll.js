$("#add").click(function (){
    $('.options').append("<input type='text' name='option[]'class='form-control' placeholder='Enter Options'><br/><br/>");
});
function vote(vid){
    
    vote = voteform.elements["poll:"+vid].value;
    if(vote.toString()==null)
    {
        return false;
    }
    $.ajax({
        url: 'vote.php',
        data:{
            vid: vid,
            vote: vote
        },
        success: function(data) {
            alert(data);
            window.location.reload();
        }
        
    });
}