case "t_ic":
    $replyData = new TemplateMessageBuilder('Image Carousel',
        new ImageCarouselTemplateBuilder(
            array(
                new ImageCarouselColumnTemplateBuilder(
                    'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/700',
                    new UriTemplateActionBuilder(
                        'Uri Template', // ข้อความแสดงในปุ่ม
                        'https://www.ninenik.com'
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/700',
                    new UriTemplateActionBuilder(
                        'Uri Template', // ข้อความแสดงในปุ่ม
                        'https://www.ninenik.com'
                    )
                )                                       
            )
        )
    );
    break;  
