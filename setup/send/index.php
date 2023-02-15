<?php 

$logo =  "";
$dados = "";

$data = $_POST['data'];
$tempo = $_POST['tempo'];
$turno = $_POST['turno'];
$acao = $_POST['tipo'];
$q = $_POST['qtd_campos'] - 1;

for ($i = 0; $i <= $q; $i++) {
   
    $aevp[] = "aevp_".$i;
    $time[] = "time_".$i;

    $create_scala[] = 
        [
            'field_63e7793adf845' => $_POST[$aevp[$i]],
            'field_63e77946df846' => $_POST[$time[$i]]
        ];
        
}

$scala = $create_scala;

if($acao == "escala") {

    //if(empty($nome) || empty($email) || empty($telefone)) {
    //    die();
    //}

    $args = array(
        'post_type'   =>  'escala',
        'post_title'  =>  'Escala '.$data.' - '.$tempo.'min - Turno:'.$turno,
        'post_status' => 'private',
    );

    // Insere dados ao POST
    $id = wp_insert_post($args);

    // Insere dados ao ACF
    $update = update_field('field_63e8512aa06b9', $data, $id);
    $update = update_field('field_63e778fcdf844', $scala, $id);


   $html = '
   <table cellpadding="0" cellspacing="0" align="center" style="max-width: 375px; background:#fff; font-family: Calibri, Arial, Helvetica, sans-serif">
   <tr>
       <td>
           <table width="100%" cellpadding="0" cellspacing="0">
               <tr>
                   <td style="text-align: center"><img src="'.$logo.'"></td>
               </tr>
               <tr>
                   <td style="border-bottom:solid 1px #e5e5e5">&nbsp;<br/><br/></td>
               </tr>
               <tr>
                   <td>&nbsp;<br/></td>
               </tr>

               <!-- dados -->
               <tr>
                   <td>
                       <table width="100%" cellpadding="0" cellspacing="0" style="color:#808080">
                               <tr>
                                   <td width="100" height="60" style="border-bottom:solid 1px #e5e5e5">Acao:</td>
                                   <td width="275" style="border-bottom:solid 1px #e5e5e5">'.$acao.'</td>
                               </tr>
                               <tr>
                                   <td width="100" height="60" style="border-bottom:solid 1px #e5e5e5">Nome:</td>
                                   <td width="275" style="border-bottom:solid 1px #e5e5e5">'.$nome.'</td>
                               </tr>
                               <tr>
                                   <td width="100" height="60" style="border-bottom:solid 1px #e5e5e5">E-mail:</td>
                                   <td width="275" style="border-bottom:solid 1px #e5e5e5">'.$email.'</td>
                               </tr>
                       </table>
                   </td>
               </tr>
               <!-- /dados -->

               <tr>
                   <td>&nbsp;<br/><br/></td>
               </tr>

               <!-- footer -->
               <tr>
                   <table width="100%" cellpadding="0" cellspacing="0" style="background:#2769cb; padding:35px; color:#fff; text-align:center; font-size: 12px">
                       <tr>
                           <!--<td><img src="" width="112">Link da Imagem</td>-->
                       </tr>
                       <tr>
                           <td>&nbsp;<br/><br/></td>
                       </tr>
                       <tr>
                           <td>'.$dados.'</td>
                       </tr>
                   </table>
               </tr>
               <!-- /footer -->
           </table>
       </td>
   </tr>
</table>
';

}


$assunto = $nome.' []';

try {

    $to = array('teste@teste','mail@mail.com.br');

    $subject = $assunto;
    $body  =   $html;
    $header  = array('Content-Type: text/html; charset=UTF-8');
    $result  = wp_mail( $to, $subject, $body , $header );


} catch(Exception $e) {}

echo print_r($scala);

?>