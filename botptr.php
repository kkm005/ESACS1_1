<?php
$access_token = 'e7j8LZupeYDsw1/VE9+xrQu6QxMvmYSwO2vSNcl3ttHhyjc8LS7XJDr4qTqDRsIhaefBDgXdPURZtLiGp+xF9dEIAqSYV17mjIbo/6XFvYQNDCeNvMi034wWBKU7cPUGALZ3vpCq+zQ3b9gFnNVhZAdB04t89/1O/w1cDnyilFU=';
// Get POST body content

//ตัวแปรข้อความที่จะแสดง
$law1 = "สาระสำคัญของ พ.ร.บ. ได้แก่ \n1. “สาขาช่างไฟฟ้าภายในอาคาร” เป็นสาขาอาชีพที่อาจเป็นอันตรายต่อสาธารณะ ซึ่งต้องดำเนินการโดยผู้ได้รับหนังสือรับรองความรู้ความสามารถ
\n2. หากฝ่าฝืน ช่างไฟฟ้าที่ทำงานโดยไม่มีหนังสือรับรองฯ ต้องระวางโทษปรับไม่เกิน 5,000 บาทและผู้จ้างงานผู้ที่ไม่มีหนังสือรับรองฯ ทำงาน ต้องระวางโทษปรับไม่เกิน 30,000 บาท
\n3. คุณสมบัติผู้ที่จะยื่นคำขอหนังสือรับรองความรู้ความสามารถ \n3.1 ผ่านการทดสอบมาตรฐานฝีมือแรงงานแห่งชาติ สาขาช่างไฟฟ้าภายในอาคาร\n3.2 มีประสบการณ์การทำงานในสาขาอาชีพที่เกี่ยวข้องกับการประเมิน\n3.3 มีคุณลักษณะส่วนบุคคลที่เหมาะสมในสาขาอาชีพที่ขอรับการประเมิน 
\nสามารถศึกษารายละเอียดของ พ.ร.บ. ได้ที่
\nhttp://www.ratchakitcha.soc.go.th/DATA/PDF/2557/A/087/19.PDF";
$law3 = "สามารถศึกษารายละเอียดได้ที่ \nhhttp://www.mol.go.th/sites/default/files/laws/th/507_file_29.saakhaaaachiiphantraay_03112559164244_.pdf";

$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			$userid = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
						
            $csv = array_map('str_getcsv', file('sta.csv'));
            $findName = iconv("utf-8","tis-620",$text);
	        $findName = strtoupper($findName);
			$jobmode = substr($findName,0,3);
			$jobserch = substr($findName,3,3);
			//$findName = strtoupper($findName);
            foreach($csv as $values)
           
			{
		    
             if(trim($values[1])==$findName or $values[2]==$findName or $values[3]==$findName) {  // index 0 contains the name
                 $Myd = iconv("tis-620","utf-8",$values[0]);  // index 1 contains the googlemap link  
		     $findresult = "success";
		     $messages = [
				'type' => 'text',
				'text' => $Myd ];
	     }
			 }
			//สร้างข้อความภาคผนวก
			if($Myd=="905"){
				$messages = array(
					'type'=> 'template',
					'altText'=> 'กรุณาเลือกภาคผนวก',
				         'template'=>array(
						 'type'=>'buttons',
						 'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',
						 'text'=>'กรุณาเลือกภาคผนวก',
				                   'actions'=>array(
							   
							         array('type'=> 'message','label'=> 'ภาคผนวก ก','text'=> 'ภาคผนวก ก'),
							         array('type'=> 'message','label'=> 'ภาคผนวก ข','text'=> 'ภาคผนวก ข'),
								 array('type'=> 'message','label'=> 'ภาคผนวก ค','text'=> 'ภาคผนวก ค'),  
								 array('type'=> 'message','label'=> 'ภาคผนวก ง','text'=> 'ภาคผนวก ง')  
								   
								   )
					                   )
					
					
					);
						  
			}
			//จบสร้างข้อความภาคผนวก
			////เข้าโหมดระเบียบ
			if ($Myd=="901") {
		                // Build message to reply back
				$findresult = "N/A";
			$messages = array(
					 'type'=> 'template',
                                          'altText'=> 'ระเบียบก่อสร้างปี 59 กรุณาเลือกหมวด',
                                           'template'=>array (
                                                             'type'=> 'carousel',
                                                         'columns'=> array(
							   
						                    array(
							            'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',
								    'title'=>'ระเบียบก่อสร้างปี59 กรุณาเลือกหมวด',    
								    'text'=> 'หมวดที่1 สำรวจออกแบบ ประมาณการ',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกหมวดที่ 1'
                                                                                            )
                                                                                      )//action col1
								     ),
								     array(
							            'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',
							            'title'=>'ระเบียบก่อสร้างปี59 กรุณาเลือกหมวด', 
								    'text'=> 'หมวดที่2 การดำเนินการก่อสร้าง',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกหมวดที่ 2'
                                                                                            )
                                                                                      )//action col2
							             ),
							              array(
								    'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',      
							           'title'=>'ระเบียบก่อสร้างปี59 กรุณาเลือกหมวด', 
								    'text'=> 'หมวดที่3 อำนาจอนุมัติ',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกหมวดที่ 3'
                                                                                            )
                                                                                      )//action col3
								     ),
								   array(
							          'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',
							           'title'=>'ระเบียบก่อสร้างปี59 กรุณาเลือกหมวด', 
								    'text'=> 'ภาคผนวก',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'ภาคผนวก'
                                                                                            )
									               
                                                                                      )//action col4
								     )
								 
								 
								 
								 
								     ) //array columns
                                                            )//array templete
				                    
                                            ); //array messages 
			
			 }
			/////จบเข้าโหมดระะเบียบ
			 if($text=="คุณเลือกแผนกแรงสูง"){ 
			    $Myd = "1.การปักเสา เสาตอม่อ\n2.การติดตั้งคอน ลูกถ้วย และประกอบอนด์ไวร์\n3.การติดตั้งเหล็กรับสายล่อฟ้า\n4.การฝังสมอบก และประกอบยึดโยงระบบจำหน่าย\n5.การฝังสมอบก และประกอบยึดโยงสายล่อฟ้า\n6.การพาดสายไฟ ระยะหย่อนยาน\n7.การพาดสายล่อฟ้า ระยะหย่อนยาน\n8.ระยะห่าง ความสูงของสายไฟ\n9.การพันและผูกลูกถ้วย\n10.การต่อสาย พันเทป(\n11.การเชื่อมสาย สายแยก พันเทป\n12.การเข้าปลายสาย\n13.การตัดต้นไม้\n14.การทาสีเสา\n15.การพ่นสี หมายเลขเสา\n16.การยึดโยง\n17.การต่อลงดิน\n18.การติดตั้งกับดักเสิร์จแรงสูง\nต้องการดูแบบมาตรฐานหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
			
			 $messages = [
				'type' => 'text',
				'text' => $Myd 
			           ];
			 }
			 if($text=="คุณเลือกแผนกหม้อแปลง"){ 
			    $Myd = "34.การติดตั้งหม้อแปลง (ระยะความสูง,ทิศทาง\n35.การติดตั้งคอน ลูกถ้วย และประกอบบอนด์ไวร์\n36.การพาดสายแรงสูงเข้าหม้อแปลง และลำดับเฟส\n37.การผูกสายไฟกับลูกถ้วย\n38.การติดตั้งกับดักเสิร์จแรงสูง หางปลา\n39.การติดตั้งดร็อปเอาท์ พินเทอร์มินอล และฟิวส์ลิงค์\n40.การติดตั้งคอนสปัน 3,200 มม.ระยะความสูง\n41.การเข้าสายบุชชิ่งหม้อแปลง หางปลา ฉนวนครอบุชชิ่ง\n42.การติดตั้งสายแรงต่ำ และลำดับเฟส\n43.การติดตั้งกับดักเสิร์จแรงต่ำ\n44.การติดตั้งคอนสำหรับ LT ,LT สวิตซ์ และฟิวส์แรงต่ำ\n45.การติดตั้งที่จับขอบถัง,เหล็กแขวน ท่อร้อยสายแรงต่ำ\n46.เทคตอนกรีตที่คาน โคนเสา\n47.การต่อลงดิน\n48.ความต้านทานดินต่อจุด\nต้องการดูแบบมาตรฐานหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
			$messages = [
				'type' => 'text',
				'text' => $Myd   
			              ];
			 }
			 if($text=="คุณเลือกแผนกแรงต่ำ"){ 
			    $Myd = "19.การปักเสา เสาตอม่อ\n20.การติดตั้งคอน แร็ค\n21.การฝังสมอบก และประกอบยึดโยง\n22.การพาดสายไฟ ระยะหย่อนยาน\n23.ระยะห่าง ความสูงของสายไฟ\n24.การผูกสายไฟกับลูกรอกแรงต่ำ\n25.การต่อสาย พันเทป\n26.การเชื่อมสาย สายแยก พันเทป\n27.การเข้าปลายสาย\n28.การติดตั้งกับดักเสิร์จแรงต่ำ\n29.การทาสีเสา\n30.การพ่นสีเสา หมายเลขเสา\n31.การยึดโยง\n32.การต่อลงดิ\n33.ค่าความต้านทานดินรวม\nต้องการดูแบบมาตรฐานในหัวข้อไหนสามารถพิมพ์เลขที่หัวข้อได้เลย";
			$messages = [
				'type' => 'text',
				'text' => $Myd    
			             ];
			 }
			if($text=="พ.ร.บ.พัฒนาฝีมือแรงงานฯ"){$Myd = $law1;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="อาชีพที่ต้องมีหนังสือรับรองฯ"){$Myd = $law2;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="ช่างไฟฟ้าภายในอาคาร"){$Myd = $law3;$messages = ['type' => 'text','text' => $Myd];}
			
			if($text=="ข้อมูลยานพาหนะ"){$Myd = "ข้อมูลยานพาหนะ สามารถค้นหาข้อมูลยานพาหนะของ กฟต.1 ได้โดยการพิมพ์หมายเลขทะเบียน เช่น กธ-6340";$messages = ['type' => 'text','text' => $Myd];}
			if($text=="เสา"){$Myd = $pole;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="คอนสาย คาน"){$Myd =  $crossarm;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="อุปกรณ์ยึดคอนสาย"){$Myd = $cross_eq;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="เสาตอม่อ ยึดโยง"){$Myd = $stub;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="ล่อฟ้า การต่อลงดิน"){$Myd = $li;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="ลูกถ้วยฉนวน"){$Myd = $insulator;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="สายไฟฟ้า"){$Myd = $conduc;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="มิเตอร์ ซี.ที วี.ที"){$Myd = $meter;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="ป้องกันและสวิตช์"){$Myd = $protec;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="หม้อแปลงไฟฟ้า"){$Myd = $tran;$messages = ['type' => 'text','text' => $Myd];}
			if($text=="อุปกรณ์ไฟถนน"){$Myd = $street;$messages = ['type' => 'text','text' => $Myd];}
			if($Myd==""){
				$Myd = "ศูนย์ประเมินความรู้ความสามารถตามมาตร 26/4 (2) ของ \nการไฟฟ้าส่วนภูมิภาค เขต 1 (ภาคใต้) จ.เพชรบุรี ครับ...\n...คุณสามารถเริ่มการใช้งานได้โดยการพิมพ์คำว่า เมนู ";
				$messages = ['type' => 'text','text' => $Myd];			}
			 if($Myd=="999"){ 
				 $findresult = "success";
			    $messages = array(
					 'type'=> 'template',
                                          'altText'=> 'อุปกรณ์ในระบบจำหน่าย',
                                           'template'=>array (
                                                             'type'=> 'carousel',
                                                             'columns'=> array(
						                               array(
										     'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC1.jpg',
								                     'title'=>'อุปกรณ์ในระบบจำหน่าย',    
								                     'text'=> 'กรุณาเลือกหมวด',
                                                                                        'actions'=>array (
                                                                                                           array(
                                                                                                                 'type'=> 'message',
                                                                                                                 'label'=> 'เสา',
                                                                                                                 'text'=> 'เสา'
                                                                                                                 ),
									                                   array(
                                                                                                                'type'=> 'message',
                                                                                                                 'label'=> 'คอนสาย คาน',
                                                                                                                 'text'=> 'คอนสาย คาน'
                                                                                                                  ),
												           array(
                                                                                                                'type'=> 'message',
                                                                                                                 'label'=> 'อุปกรณ์ยึดคอนสาย คาน',
                                                                                                                 'text'=> 'อุปกรณ์ยึดคอนสาย'
                                                                                                                  )
                                                                                                                  )//action col1
								            ),
								     array(
							            'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC1.jpg',
							            'title'=>'อุปกรณ์ในระบบจำหน่าย', 
								    'text'=> 'กรุณาเลือกหมวด',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เสาตอม่อ ยึดโยง',
                                                                                            'text'=> 'เสาตอม่อ ยึดโยง'
                                                                                            ),
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'ล่อฟ้า การต่อลงดิน',
                                                                                            'text'=> 'ล่อฟ้า การต่อลงดิน'
                                                                                            ),
									 array(
                                                                                             'type'=> 'message',
                                                                                              'label'=> 'ลูกถ้วยฉนวน',
                                                                                               'text'=> 'ลูกถ้วยฉนวน'
                                                                                                                  )
                                                                                      )//action col2
							             ),
							              array(
							           'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC1.jpg',
							           'title'=>'อุปกรณ์ในระบบจำหน่าย', 
								    'text'=> 'กรุณาเลือกหมวด',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'สายไฟฟ้า',
                                                                                            'text'=> 'สายไฟฟ้า'
                                                                                            ),
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'มิเตอร์ ซี.ที วี.ที',
                                                                                            'text'=> 'มิเตอร์ ซี.ที วี.ที'
                                                                                            ),
									    array(
                                                                                             'type'=> 'message',
                                                                                              'label'=> 'ป้องกันและสวิตช์',
                                                                                           'text'=> 'ป้องกันและสวิตช์'
                                                                                                                  )
                                                                                      )//action col3
								     ),
								   array(
							           'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC1.jpg',
							           'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก', 
								    'text'=> 'อุปกรณ์ในระบบจำหน่าย',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'หม้อแปลงไฟฟ้า',
                                                                                            'text'=> 'หม้อแปลงไฟฟ้า'
                                                                                            ),
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'อุปกรณ์ไฟถนน',
                                                                                            'text'=> 'อุปกรณ์ไฟถนน'
                                                                                            ),
									    array(
                                                                                                                'type'=> 'message',
                                                                                                                 'label'=> 'อื่นๆ',
                                                                                                                 'text'=> 'other'
                                                                                                                  )
									               
                                                                                      )//action col4
								     )
								 
								 
								 
								 
								     ) //array columns
                                                            )//array templete
				                    
                                            ); //array messages 
			 }
			
			
			 if ($text=="มาตรฐานงานก่อสร้าง"){
				 $findresult = "N/A";
				 $messages = array(
					 'type'=> 'template',
                                          'altText'=> 'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก',
                                           'template'=>array (
                                                             'type'=> 'carousel',
                                                         'columns'=> array(
							   
						                    array(
							           'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',
								    'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก',    
								    'text'=> 'แผนกแรงสูง',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกแผนกแรงสูง'
                                                                                            )
                                                                                      )//action col1
								     ),
								     array(
								    'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',
							            'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก', 
								    'text'=> 'แผนกหม้อแปลง',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกแผนกหม้อแปลง'
                                                                                            )
                                                                                      )//action col2
							             ),
							              array(
								  'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',
							           'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก', 
								    'text'=> 'แผนกแรงต่ำ',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'คุณเลือกแผนกแรงต่ำ'
                                                                                            )
                                                                                      )//action col3
								     ),
								   array(
							          'thumbnailImageUrl'=>'https://raiingphu.com/psq/PIC2.jpg',
							           'title'=>'มาตรฐานงานก่อสร้างกรุณาเลือกแผนก', 
								    'text'=> 'อุปกรณ์ในระบบจำหน่าย',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เลือก',
                                                                                            'text'=> 'equip'
                                                                                            )
									               
                                                                                      )//action col4
								     )
								 
								 
								 
								 
								     ) //array columns
                                                            )//array templete
				                    
                                            ); //array messages 
			 }
			 //พิกัดงานก่อสร้าง
			 if($text=="พิกัดตำแหน่งงานก่อสร้าง"){$Myd = "เมนู พิกัดงานก่อสร้าง คุณสามารถพิมพ์รหัสแฟ้มงานก่อสร้าง ที่อยู่ในแผนผังได้เลย ครับ";
				$messages = ['type' => 'text','text' => $Myd];
				 
			 }
			 ///
			///เลือก mode
			if($text=="เมนู"){
				$messages = array(
					 'type'=> 'template',
                                          'altText'=> 'Electrician Skill Assessment Center - PEA S1',
                                           'template'=>array (
                                                             'type'=> 'carousel',
                                                             'columns'=> array(
						                               array(
										     'thumbnailImageUrl'=>'https://image.ibb.co/gTW9Kb/ESAC2.jpg',
								                     'title'=>'พระราชบัญญัติและประกาศฯ ที่เกี่ยวข้อง',    
								                     'text'=> 'กรุณาเลือกหัวข้อที่ต้องการทราบ',
                                                                                        'actions'=>array (
                                                                                                           array(
                                                                                                                 'type'=> 'message',
                                                                                                                 'label'=> 'พ.ร.บ.พัฒนาฝีมือแรงงานฯ',
                                                                                                                 'text'=> 'พ.ร.บ.พัฒนาฝีมือแรงงานฯ'
                                                                                                                 ),
									                                   array(
                                                                                                                'type'=> 'message',
                                                                                                                 'label'=> 'อาชีพที่ต้องมีหนังสือรับรองฯ',
                                                                                                                 'text'=> 'อาชีพที่ต้องมีหนังสือรับรองฯ'
                                                                                                                  ),
												           array(
                                                                                                                'type'=> 'message',
                                                                                                                 'label'=> 'ช่างไฟฟ้าภายในอาคาร',
                                                                                                                 'text'=> 'ช่างไฟฟ้าภายในอาคาร'
                                                                                                                  )
                                                                                                                  )//action col1
								            ),
								     array(
							            'thumbnailImageUrl'=>'https://image.ibb.co/gTW9Kb/ESAC2.jpg',
							            'title'=>'การขอหนังสือรับรองความรู้ความสามารถ', 
								    'text'=> 'กรุณาเลือกหัวข้อที่ต้องการทราบ',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'ขั้นตอนการขอหนังสือฯ',
                                                                                            'text'=> 'ขั้นตอนการขอหนังสือฯ'
                                                                                            ),
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'เอกสารประกอบที่ใช้',
                                                                                            'text'=> 'เอกสารประกอบที่ใช้'
                                                                                            ),
									 array(
                                                                                             'type'=> 'message',
                                                                                              'label'=> 'หลักเกณฑ์การประเมิน',
                                                                                               'text'=> 'หลักเกณฑ์การประเมิน'
                                                                                             )
                                                                                      )//action col2
							             ),
								     array(
							            'thumbnailImageUrl'=>'https://image.ibb.co/gTW9Kb/ESAC2.jpg',
							            'title'=>'สถานที่ติดต่อ', 
								    'text'=> 'กรุณาเลือกหัวข้อที่ต้องการทราบ',
                                                                    'actions'=>array (
                                                                                      array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'สถานที่ติดต่อ',
                                                                                            'text'=> 'สถานที่ติดต่อ'
                                                                                            ),
									    array(
                                                                                            'type'=> 'message',
                                                                                            'label'=> 'แผนที่',
                                                                                            'text'=> 'แผนที่'
                                                                                            ),
									 array(
                                                                                             'type'=> 'message',
                                                                                              'label'=> 'หลักเกณฑ์การประเมิน',
                                                                                               'text'=> 'หลักเกณฑ์การประเมิน'
                                                                                             )
                                                                                      )//action col3
							             )
						  ) //array columns
                                                            )//array templete
				                    
                                            ); //array messages
			}/////จบเลือกโหมด
			
			//เชค 3 ตัวแรก โหมดพิกัดงานก่อสร้าง
			if($jobmode=="JOB"){
				$csv = array_map('str_getcsv', file('job.csv'));
				foreach($csv as $values)
           
			{
		    
             if(trim($values[0])==$jobserch) {  // index 0 contains the name
                 $Myd1 = iconv("tis-620","utf-8",$values[1]);  //งบ
				 $Myd2 = $values[2];  //ชื่องาน
				 $Myd3 = iconv("tis-620","utf-8",$values[3]);//พิกัด
				 $Myd4 = iconv("tis-620","utf-8",$values[4]); // หมายเลขงาน
				 $Myd5 = $values[5]; //ผู้เขียนแบบ
				  $findresult = "success";
				  $Myd = "งบ :".$Myd1."\nชื่องาน :".$Myd2."\nหมายเลขงาน :".$Myd4."\nผู้เขียนแบบ:".$Myd5."\nพิกัด :".$Myd3;
		     $messages = [
				'type' => 'text',
				'text' => $Myd];
	     }
			 }
				
				
			}//จบโหมดงานก่อสร้าง
			
                // Build message to reply back
			

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		
			
		}
	}
	//// getdisplay
	$url = 'https://api.line.me/v2/bot/profile/'.$userid;

   $headers = array('Authorization: Bearer ' . $access_token);
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   $result = curl_exec($ch);
   curl_close($ch);
   
   
   
	//end get

}
$Ti = date("H:i:s",mktime(date("H"), date("i"), date("s")));
$Da = date("d.m.y");
$strFileName = "stadis.csv";
$objFopen = fopen($strFileName, 'a');
//$findName1 = iconv("tis-620","utf-8",$findName);
$strText1 = "\n".$Da.",".$Ti.",".$findName.",".$findresult.",".$result;
fwrite($objFopen, $strText1);
fclose($objFopen);

echo "OK";
