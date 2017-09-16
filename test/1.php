<?php
 /**
 * ��ȡPDF�ļ�ҳ���ĺ�����ȡ
 * �ļ�Ӧ���Ե�ǰ�û��ɶ���linux�£�
 * @param  [string] $path [�ļ�·��]
 * @return [array]        [�����һλ��ʾ�ɹ���񣬵ڶ�λ��ʾ��ʾ��Ϣ]
 */
 function getPdfPages($path){

    if(!file_exists($path)) return array(false,"�ļ�\"{$path}\"�����ڣ�");
    if(!is_readable($path)) return array(false,"�ļ�\"{$path}\"���ɶ���");
    // ���ļ�
    $fp=@fopen($path,"r");
    if (!$fp) {
        return array(false,"���ļ�\"{$path}\"ʧ��");
    }else {
        $max=0;
        while(!feof($fp)) {
            $line = fgets($fp,255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)){
                preg_match('/[0-9]+/',$matches[0], $matches2);
                if ($max<$matches2[0]) $max=$matches2[0];
            }
        }
        fclose($fp);
 
        // ����ҳ��
        return array(true,$max);
    }
 }
    /**
     * ���Դ���
     */
    $results=getPdfPages("demo.pdf");
    if($results[0]){
     echo $results[1];
        // ��������óɹ���ȡ��Ĵ������
    }else{
        // ���������ʧ�ܵĴ������
    }
 ?>
