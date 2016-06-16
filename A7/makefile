all:
	chmod "u+x" q1; \
	./q1; \
	chmod "u+x" q2; \
	./q2; \
	sudo apt-get install fig2ps; \
        fig2pdf q3.fig; \
	pdflatex q4.tex; \
	pdflatex q4.tex; \
	rm -f q4.aux q4.idx q4.ilg q4.ind q4.log q4.toc q3.fig.bak q4.synctex.gz q4.lof;

q1:	
	chmod "u+x" q1; \
	./q1;

q2:
	chmod "u+x" q1; \
	./q2;

q3:
	sudo apt-get install fig2ps; \
	fig2pdf q3.fig;

q4:
	pdflatex q4.tex; \
	pdflatex q4.tex; 

clean:
	rm -f q4.aux q4.idx q4.ilg q4.ind q4.log q4.toc q3.fig.bak q4.synctex.gz q4.lof;

clean_all:
	rm -f q4.aux q4.idx q4.ilg q4.ind q4.log q4.toc q3.fig.bak q3.pdf averages.txt output2.png q4.pdf q4.synctex.gz q4.lof;

install:
	sudo apt-get install fig2ps;
