function showPage (page){
    $('section').each((i, element) => {
        $(element).attr('id') === page 
            ? $(element).removeClass('hidden') 
            : $(element).addClass('hidden');  
    });
};


