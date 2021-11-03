function prototype(e){
    
    const collectionHolder = $(e).parent().parent().find('.' + e.dataset.collectionHolderClass)[0];
        const item = document.createElement('li');
        console.log(collectionHolder.dataset.index);
        item.innerHTML = collectionHolder
            .dataset
            .prototype
			.replaceAll(
            '!!',
            "'"
            )
            .replace(
                /__sous_taux_prot__/g,
                collectionHolder.dataset.index
                )
                .replace(
                    /__qnb__/g,
                    (parseInt(collectionHolder.dataset.index) +1)
                    )
                    .replace(
                        /__qnbb__/g,
                        (parseInt(collectionHolder.dataset.index) +1)
                        )
                        .replace(
                            /__qnbbb__/g,
                            (parseInt(collectionHolder.dataset.index) +1)
                            )
            .replace(
            /__sous_taux_period_prot__/g,
            collectionHolder.dataset.index
            );
		console.log(item.innerHTML);
        collectionHolder.appendChild(item);
        collectionHolder.dataset.index++;
}

jQuery(function ($) {
  


    $(".add_item_link").click(function (e) {
       
        const collectionHolder1 = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
		collectionHolder = $(this).parent().parent().find('.' + e.currentTarget.dataset.collectionHolderClass)[0];
        console.log(collectionHolder);
        const item = document.createElement('li');
		
        item.innerHTML = collectionHolder
            .dataset
            .prototype
			.replaceAll(
            'z',
            "'"
            )
            .replaceAll(
                '!!',
                "'"
                )
                .replace(
                    /__qnb__/g,
                    (parseInt(collectionHolder.dataset.index) +1)
                    )
                    .replace(
                        /__qnbb__/g,
                        (parseInt(collectionHolder.dataset.index) +1)
                        )
            .replace(
                /__taux_prot__/g,
                collectionHolder.dataset.index
                )
            .replace(
            /__sous_taux_prot__/g,
            collectionHolder.dataset.index
            );
		console.log(item.innerHTML);
        collectionHolder.appendChild(item);
        collectionHolder.dataset.index++;
    });
    $(".add_item_link_pres").click(function (e) {
		alert("test");
		console.log(e.currentTarget.dataset.collectionHolderClass);
        const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
		console.log(collectionHolder);
        const item = document.createElement('li');
		
        item.innerHTML = collectionHolder
            .dataset
            .prototype
			.replaceAll(
            'z',
            "'"
            )
            .replace(
            /__name__/g,
            collectionHolder.dataset.index
            );
		console.log(item.innerHTML);
        collectionHolder.appendChild(item);
        collectionHolder.dataset.index++;
    });
    


    $(".add_item_link_taux").click(function (e) {
		console.log(e.currentTarget.dataset.collectionHolderClass);
        const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
		console.log(collectionHolder);
        const item = document.createElement('li');
		
        item.innerHTML = collectionHolder
            .dataset
            .prototype
			.replaceAll(
            'z',
            "'"
            )
            .replace(
                /__qnb__/g,
                (parseInt(collectionHolder.dataset.index) +1)
                )
            .replace(
            /__taux_prot__/g,
            collectionHolder.dataset.index
            );
		console.log(item.innerHTML);
        collectionHolder.appendChild(item);
        collectionHolder.dataset.index++;
    });
    $(".display-none-list").click(function (e) {
        ul = $(this).parent().next().find("ul");
        
        if(ul.length == 0) {
        ul = $(this).parent().parent();

        }
        console.log(ul);
        if($(this).text() == '+'){
   
       
        ul.show();
        $(this).text("-");
        } else{

            ul.hide();
            $(this).text("+");
        }


    });
});


