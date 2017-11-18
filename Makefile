#create a conda environment
.PHONY : env
env :
	conda env create -f environment.yml

.PHONY : all
all : # run the notenook
	rm -f results/*
	jupyter nbconvert --ExecutePreprocessor.timeout=600 --to notebook --execute state_of_the_union_analysis*.ipynb
	jupyter nbconvert --ExecutePreprocessor.timeout=600 --to notebook --execute main.ipynb