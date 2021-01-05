<?php
require_once( "sparqlib.php" );

$db = sparql_connect( "http://localhost:3030/Tubes_SW/query" );
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );
sparql_ns("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
sparql_ns("rdfs", "http://www.w3.org/2000/01/rdf-schema#");

# filename: ex070.rq

  $sparql = "prefix dbp:   <https://wiki.dbpedia.org/#> 
			 prefix rdf:   <http://www.w3.org/1999/02/22-rdf-syntax-ns#> 

			 SELECT  ?Nama ?Main ?Menang ?Seri ?Kalah ?Poin
			 WHERE {
                 ?club dbp:namaKlub ?Nama.
                 ?club dbp:main ?Main.
                 ?club dbp:menang ?Menang.
                 ?club dbp:seri ?Seri.
                 ?club dbp:kalah ?Kalah.
                 ?club dbp:poin ?Poin.
			 } ORDER BY Desc(?Menang) Desc(?Seri)";

   $result = sparql_query( $sparql ); 
   $fields = sparql_field_array( $result );
   
   # Output the result as HTML

print "<html><head><title>SPARQL Cocktails Results</title>\n";
print "<style type='text/css'> 
		.content-table{
			border-collapse : collapse;
			min-width : 850px;
			border-color : #dedede;
            margin: auto;
		}
        
        .epl{
            text-align:justify;
        }
	
		
		.content-table thead tr{
			background-color : #009879;
			text-align : center;
			font-color : #ffffff;
			border-color : #ffffff;
		}
		
		.content-table th,
		.content-table td {
			padding : 1px 3px;
			border-color : #dedede;
            text-align: center;
			
		}
		
		.content-table tbody tr{
			border-bottom : 1px solid #dddddd;
			border-color : #dedede;
		}
		
		.content-table tbody tr:nth-of-type(even) {
			background-color #f3f3f3;
			border-color : #dedede;
		}
		
		.content-table tbody tr:last-of-type {
			border-bottom : 1px solid #009879;
			border-color : #dedede;
		}
		
			
	</style>\n";
	print "</head><body>\n";
	print "<br/>";
    print "<div class='epl'>";
	print "<table border='3' class='content-table'>";
	print "<thead>";
	print "<tr>";
	foreach( $fields as $field )
	{
		print "<th>$field</th>";
	}
	print "</tr>";
	print "</thead>";
	print "<tbody>";
	while( $row = sparql_fetch_array( $result ) )
	{
		print "<tr>";
		foreach( $fields as $field )
		{
			print "<td>$row[$field]</td>";
		}
		print "</tr>";
	}
	print "</tbody>";
	print "</table>";
    print "</body></html>\n";	