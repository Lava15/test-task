Задача 1 - Решение:

С учетом того, что в базе данных более 100 000 постов и каждый пост содержит более 20 полей с данными, оптимальным вариантом будет SQL запрос (Вариант 3). Потому что `WP_Query` и `get_posts` загружают дополнительные данные и выполняют множество дополнительных операций, что может быть неэффективно для такого большого объема данных.

SQL запрос минимизирует количество извлекаемых данных и, таким образом, может работать быстрее за счет обращения напрямую к базе данных.
