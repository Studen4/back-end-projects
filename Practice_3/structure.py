from graphviz import Digraph

dot = Digraph(comment='Site Structure')

# Pages
dot.node('I', 'index.php\n(Головна)')
dot.node('N', 'sectionNavbar.php\n(Навігація)')
dot.node('G', 'guestbook.php\n(Форма+Коментарі)')
dot.node('A', 'admin.php\n(Адмінка)')
dot.node('L', 'login.php\n(Логін)')
dot.node('R', 'register.php\n(Реєстрація)')

# Files
dot.node('UC', 'users.csv\n(Користувачі)', shape='folder')
dot.node('CC', 'comments.csv\n(Коментарі)', shape='folder')

# Sessions
dot.node('S', 'Сесія\n(auth)', shape='ellipse')

# Connections
dot.edges([('I', 'N'), ('N', 'G'), ('N', 'A'), ('N', 'L'), ('N', 'R')])
dot.edge('G', 'CC', label='POST: збереження')
dot.edge('G', 'CC', label='GET: вивід')
dot.edge('R', 'UC', label='запис')
dot.edge('L', 'UC', label='читання')
dot.edge('L', 'S', label='успішний логін')
dot.edge('S', 'A', label='auth==true')
dot.edge('A', 'UC', label='читання/перевірка')

dot.render('site_structure', format='png', cleanup=False)
