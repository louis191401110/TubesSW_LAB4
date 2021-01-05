<?php
require_once( "sparqlib.php" );

$db = sparql_connect( "http://localhost:3030/kampus_komputer/query" );
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );
sparql_ns("rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
sparql_ns("rdfs", "http://www.w3.org/2000/01/rdf-schema#");

# filename: ex070.rq

  $sparql = "prefix dc: <http://purl.org/dc/elements/1.1/>
            prefix dbp: <http://dbpedia.org/property/>
            prefix foaf: <http://xmlns.com/foaf/0.1/>
                                   
            SELECT ?Nama ?Subjek ?Tipe ?Tanggal
             WHERE{
                 ?sub dbp:name ?Nama.
                 ?sub dc:subject ?Subjek.
                 ?sub dc:type ?Tipe.
                 ?sub dc:date ?Tanggal.
             } ORDERBY ?subject";

   $result = sparql_query( $sparql ); 
   $fields = sparql_field_array( $result );
   
   # Output the result as HTML

print "<html><head><title>SPARQL Cocktails Results</title>\n";
print "<style type='text/css'> 
		.content-table{
			border-collapse : collapse;
			min-width : 850px;
			border-color : #00FFFF;
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
		
		.content-table th{
            text-align : center;
        }
        
		.content-table td {
			padding : 3px 5px;
			border-color : #00FFFF;
            text-align: left;
		}
		
		.content-table tbody tr{
			border-bottom : 1px solid #dddddd;
			border-color : #00FFFF;
		}
		
		.content-table tbody tr:nth-of-type(even) {
			background-color #f3f3f3;
			border-color : #00FFFF;
		}
		
		.content-table tbody tr:last-of-type {
			border-bottom : 1px solid #009879;
			border-color : #00FFFF;
		}
		
			
	</style>\n";
	print "</head><body>\n";
	print "<br/>";
	print "<div class='epl'> ";
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