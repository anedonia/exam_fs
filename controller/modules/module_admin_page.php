<?php

function user_show($user)
{
    $tab_html = [];

    for ($i=0;$i < count($user); $i++) 
    {
        array_push($tab_html,
            '<tr>
              <th scope="row">'.$user[$i]["id_user"].'</th>
              <td>'.$user[$i]["fisrt_name"].'</td>
              <td>'.$user[$i]["last_name"].'</td>
              <td>'.$user[$i]["login_name"].'</td>
              <td>'.$user[$i]["email"].'</td>
              <td>
              <form id="del" action=\'\' method=\'GET\'>
                        <input type="hidden" name="action" value="delete"/>
                        <input type="hidden" name="target" value="'.$user[$i]["id_user"].'"/>
              </form>
              <a class="btn btn-danger btn-sm" onclick=\'document.getElementById("del").submit()\'>Delete</a>
              <button type="submit" class="btn btn-success btn-sm">Modify</button>
              </td>
            </tr>');
    }
    return implode($tab_html);

}