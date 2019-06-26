  $end_definv1  = '<p style="font-size:16px;">Inventory Running Balance - '.$date10.'</p>';
  $end_definv1 .= '<table style="border-collapse:collapse; text-align:left; width="100%">'; 
  $end_definv1 .= 
  '<tr style="background-color: #AED6F1;">
    <td style="border: 1px solid #dddddd; padding:8px;">SO SKU</td>
    <td style="border: 1px solid #dddddd; padding:9px;">DESCRIPTION</td>
    <td style="border: 1px solid #dddddd; padding:9px;">BAL</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_today.'</td>
    <td>30D</td>
    <td>14D</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_yesterday.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_lasttwo.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last3.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last4.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last5.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last6.'</td>
    <td>7D</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last7.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last8.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last9.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last10.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last11.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last12.'</td>
    <td style="border: 1px solid #dddddd; padding:9px;">'.$date_last13.'</td>
</tr>';



if ($end_definv < $row_def30['qty30'] && $end_definv > $row_def1['qty013'] && $end_definv > $row_def7['qty7']) 
{
    $echo_inv = '<td style=" background-color:#FFFF00; border: 1px solid #dddddd; padding:9px; font-weight:bold;">';
}
else if ($end_definv < $row_def30['qty30'] && $end_definv < $row_def1['qty013'] && $end_definv > $row_def7['qty7']) 
{
    $echo_inv = '<td style=" background-color:#FFCCCC; border: 1px solid #dddddd; padding:9px; font-weight:bold;">';
}        
else if ($end_definv < $row_def30['qty30'] && $end_definv < $row_def1['qty013'] && $end_definv <= $row_def7['qty7']) 
{
    $echo_inv = '<td style=" background-color:#F1948A; border: 1px solid #dddddd; padding:9px; font-weight:bold;">'; 
}
else 
{
    $echo_inv = '<td style="border: 1px solid #dddddd; padding:9px; font-weight:bold;">';
}


$end_definv1 .=   
'<tr>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def1['item_number'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def1['description'].'</td>'
.$echo_inv.$end_definv.'</td>'                                                  
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def4['qty4'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px; font-weight:bold;">'.'<font color="#006600">'.$row_def30['qty30'].'<font></td>'
.'<td style="border: 1px solid #dddddd; padding:9px; font-weight:bold;">'.'<font color="#006600">'.$row_def1['qty013'].'</font></td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def5['qty5'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def01['qty01'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def03['qty03'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def04['qty04'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def05['qty05'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def06['qty06'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px; font-weight:bold;">'.'<font color="#006600">'.$row_def7['qty7'].'</font></td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def07['qty07'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def08['qty08'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def09['qty09'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def10['qty10'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def11['qty11'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def12['qty12'].'</td>'
.'<td style="border: 1px solid #dddddd; padding:9px;">'.$row_def13['qty13'].'</td>
</tr>';

                                                    





