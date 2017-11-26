$imageMapUrl = 'https://www.mywebsite.com/imgsrc/photos/w/sampleimagemap';
$replyData = new ImagemapMessageBuilder(
    $imageMapUrl, // ส่วนของการกำหนด url รูป
    'This is Imagemap', // ส่วนของการกำหนดหัวเรื่องว่าเกี่ยวกับอะไร
    new BaseSizeBuilder(699,1040), // กำหนดขนาดของรูป (สูง,กว้าง)
    array(
        new ImagemapMessageActionBuilder(
            'test image map',
            new AreaBuilder(0,0,520,699)
            ),
        new ImagemapUriActionBuilder(
            'http://www.ninenik.com',
            new AreaBuilder(520,0,520,699)
            )
    ));
