https://laracasts.com/series/laravel-5-fundamentals/episodes/22?autoplay=true
#loob uue git repository sellesse kausta kus asud
git init

#lisame repository (nt github või bitbucket)
git remote add origin github.com:kasutaja/laraveltest.git

#olukorra ülevaade (ka konflikti lahenduse nägemiseks)
git status

#failide lisamiseks commit jaoks
git add .gitignore
git add *.txt
git add all
git add .
#muudetud failide pakendamine
git commit -m "kommentaar"

#failide laadimiseks serverisse (origin ehk server ja master ehk branch)
git push -u origin master

#kuvab commit ajaloo
git log

#võtab serverist viimase versiooni (nt kui muudetud on mujal kui teie arvutist)
git pull origin master --allow-unrelated-histories

#kasutaja konfigureerimine
git config --global user.email example@address.com

#uue branchi loomine
git checkout -b newbranchname

#branchi vahetamine
git checkout branchname