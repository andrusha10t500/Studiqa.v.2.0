<strike>1) Реализовать главную страницу с произвольным контентом - текст + картинки. При клике на картинку, она отображается в увеличенном виде во всплывающем окне (достаточно прикрутить любую jQuery-библиотеку).</strike><br>
2) <ins><p style="text-color: red">В панели администрирования суперадминистратор должен иметь возможность редактировать контент главной страницы (Наполовину завершено)</p> </ins><br>
<strike>3) Реализовать 2 страницы с формами "заявок", включающими поля (имя, фамилия, телефон, емейл, уровень образования), и рандомным контентом (текст-рыба + картинки, видео, что угодно).</strike><br> 
<strike> 4) Форма отправляется ajax-запросом. После обработки формы следует выводить сообщение о результате успешно/не успешно. Например, можно выводить блок c соответствующим сообщением.</strike><br>
<strike>5) Уровень образования представляет собой дропдаун со следующими вариантами: Bachelor, Master, PhD. Все поля обязательны к заполнению, для валидации на фронтэнде использовать стандартную HTML 5 валидацию.</strike><br> 
<strike>6) Каждая из этих страниц предназначена для разных "клиентов" (т.е. например, это заявки на участие в мероприятии A и мероприятии B). </strike><br>
7) <ins>Заявки пользователей сохранять в отдельные таблицы в БД. (Пока всё в одной таблице) </ins><br>
<strike>8) Также следует сохранять ip, с которого совершена заявка и utm-метки (достаточно просто сохранить весь хвост get-запроса).</strike><br> 
<strike>9) После заполнения заявки пользователю приходит письмо на почту с текстом вроде "Спасибо, что зарегистрировались на наше мероприятие. Бла-бла-бла". Представителям мероприятия приходит письмо с текстом "у вас новая заявка" и данными заполненной формы. </strike><br>
10) <ins>Формы отправляются через очереди в Laravel.</ins><br>
<strike>11) Реализовать раздел административной панели, в котором будет доступен список заявок, а суперадминистраторы имеют возможность удалять существующие заявки. IP автора заявки и utm метки видны только суперадминистратору. </strike><br>
12) <ins>Пользователь с правами организатора мероприятия A не может видеть заявки мероприятия B, а представитель мероприятия B не может видеть заявки на мероприятие A.</ins><br>
13) <ins>unit-тесты</ins><br>
<strike>14) репозиторий на github/bitbucket/др.</strike> 
<h3>Осталось 5 (2,7,10,12,13)</h3>
