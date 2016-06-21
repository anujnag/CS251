\NeedsTeXFormat{LaTeX2e}
\ProvidesClass{cv}[2011/03/26 My custom CV class]
\LoadClass{article}
\RequirePackage{titlesec}  %Customizing section and subsection headings
\RequirePackage{array}  %To set column width
\RequirePackage{geometry} %To set page margins and size of paper
\RequirePackage{multicol} %For multiple column in itemize command

\titleformat{\section}         	 % Customise the \section command 
  {\Large\scshape\raggedright\bf} % Make the \section headers large (\Large),
                               % small capitals (\scshape) and left aligned (\raggedright)
  {}{0em}              % Can be used to give a prefix to all sections, like 'Section ...'
  {}                           % Can be used to insert code before the heading
  [\titlerule]                 % Inserts a horizontal line after the heading
  
\titleformat{\subsection}      %Customize the subsection
  {\large\scshape\raggedright\bf}
  {}{0em}
  {}
  [\titlerule]
  
\newcommand{\datedsection}[2]{  %To insert date along with section headings
  \section[#1]{#1 \hfill #2}    
}


\newcommand{\datedsubsection}[2]{ %To insert date along with subsection headings
  \subsection[#1]{#1 \hfill #2}
}

%This defines two new commands \datedsection and \datedsubsection which take two arguments: the section name as before, and a date which will be typeset on the right hand side of the page. The \hfill command tells LaTeX to fill as much space as possible and so pushes the second argument (#2) to the right of the page

\newcommand{\name}[1]{   %For name heading
  \centerline{\Huge{#1}}
}

\newcommand{\aftername}[1]{  %For details after name
  \centerline{\normalsize{#1}}
}