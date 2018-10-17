$(function(){
  $("#form-test").on("submit",function(e){
     // e.preventDefault();
      
      
      $("#erro-nome").html("");
      $("#erro-email").html("");
      $("#erro-texto").html("");
      
      
    nome_input = $("input[name='nome']");
      console.log(nome_input.val());
    
    if(nome_input.val() == "" || nome_input.val() == null)
    {
        
      $("#erro-nome").html("O nome obrigatorio  ");
      return(false);
    }

    email_input = $("input[name='email']");
    
    if(email_input.val() == "" || email_input.val() == null)
    {
      $("#erro-email").html("email obrigatório");
      return(false);
    }
      
      msg_input = $("textarea[name='texto']");
    
    if(msg_input.val() == "" || msg_input.val() == null)
    {
      $("#erro-text").html("menssagem obrigatória");
      return(false);
    } 
      
    return(true);
      
  });
});
