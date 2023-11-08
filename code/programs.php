<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="programs" >
        <table id = "eduprograms">
            <tr class = "line">
                <td class = 'eduprogram_number'>#</td>
                <td class = 'eduprogram_code'>Код</td>
                <td class = 'eduprogram_name'>Назва</td>
                <td class = 'eduprogram_department'>Департамент</td>
                <td class = 'eduprogram_vstup'>vstup</td>
                <td class = 'eduprogram_licence'>Ліц.</td>
                <td class = 'eduprogram_budget'>Б.</td>
                <td class = 'eduprogram_contract'>К.</td>
                <td class = 'eduprogram_price'>Ціна</td>
                <td class = 'eduprogram_garant'>Гарант</td>
                <td class = 'eduprogram_garant'>Дисципліни</td>
            </tr>
        </table>
    <script>
        url = "https://innovations.kh.ua/techeduup/back/programs.php";
        fetch(url).then(function(response) {
            response.text().then(function(text) {
            //poemDisplay.textContent = text;
            eduprogrs = JSON.parse(text);
            //console.log(discpls);
            eduprgrs = eduprogrs['eduprograms'];
            eduprograms = document.getElementById("eduprograms");
            for (edprg in eduprgrs){
                d = eduprgrs[edprg];
                d1 = document.createElement('tr');

                elem = document.createElement('td');
                elem_a = document.createElement('a');
                elem_a.href = 'https://innovations.kh.ua/techeduup/disciplines.php?id='+d.id;
                elem_a.target = "blank";
                elem_a.innerText = d.id;

                elem.appendChild(elem_a);
                elem.className = "eduprogram_number";
                d1.appendChild(elem);


                elem = document.createElement('td');
                elem.className = "program_code";
                elem.innerText = d.speciality;
                d1.appendChild(elem);


                elem = document.createElement('td');
                elem.className = "program_name";

                elem_a = document.createElement('a');
                elem_a.href = d.link;
                elem_a.target = "blank";
                elem_a.innerText = d.name;

                elem.appendChild(elem_a);
                d1.appendChild(elem);

                /*Назва департаменту та посилання на сайт*/
                elem = document.createElement('td');
                elem.className = "eduprogram_department";

                elem_a = document.createElement('a');
                elem_a.href = d.department_link;
                elem_a.target = "blank";
                elem_a.innerText = d.department_name;

                elem.appendChild(elem_a);
                d1.appendChild(elem);

                /*Vstup*/
                elem = document.createElement('td');
                elem.className = "eduprogram_department";

                elem_a = document.createElement('a');
                elem_a.href = d.vstup_link;
                elem_a.target = "blank";
                elem_a.innerText = 'Vstup';

                elem.appendChild(elem_a);
                d1.appendChild(elem);

                /*Ліцензія*/
                elem = document.createElement('td');
                elem.className = "eduprogram_licence";
                elem.innerText = d.licence;
                d1.appendChild(elem);

                /*Бюджет*/
                elem = document.createElement('td');
                elem.className = "eduprogram_budget";
                elem.innerText = d.n_bugjet;
                d1.appendChild(elem);

                /*Контракт*/
                elem = document.createElement('td');
                elem.className = "eduprogram_contract";
                elem.innerText = d.n_contract;
                d1.appendChild(elem);

                /*Ціна*/
                elem = document.createElement('td');
                elem.className = "eduprogram_price";
                elem.innerText = d.price;
                d1.appendChild(elem);

                /*Гарант*/
                elem = document.createElement('td');
                elem.className = "eduprogram_garant";
                elem.innerText = d.garant;
                d1.appendChild(elem);

                elem = document.createElement('td');
                elem_a = document.createElement('a');
                elem_a.href = 'https://innovations.kh.ua/techeduup/disciplines.php?id='+d.id;
                elem_a.target = "blank";
                elem_a.innerText = 'Дисципліни';

                elem.appendChild(elem_a);
                elem.className = "eduprogram_number";
                d1.appendChild(elem);



                eduprograms.appendChild(d1);
                console.log( eduprgrs[edprg]);
            }
            });
        });


    </script>
</body>
</html>