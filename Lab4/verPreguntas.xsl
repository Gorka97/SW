<?xml version="1.0" ?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <style type='text/css'>
                    body{
                        font-family: calibri;
                        font-size:2;
                    }
                    
                    table th {
                        background-color:#F0F8FF;
                        padding: 8px;
                    }
                    
                    table td {
                        background-color: #F0FFFF;
                    }
                    
                    table tr {
                        text-align: center;
                    }
                </style>  
            </head>
            <body>
                <table border="1" align="center">
                    <thead>
                        <tr>
                            <th>AUTOR</th> <th>PREGUNTA</th> <th>CORRECTA</th> <th>INCORRECTAS</th> <th>DIFICULTAD</th> <th>TEMA</th>
                        </tr>
                    </thead>
                        <xsl:for-each select="/assessmentItems/assessmentItem" >
                            <tr>
                                <td>
                                    <xsl:value-of select="@author"/> 
                                </td>
                                <td>
                                    <xsl:value-of select="itemBody/p"/>
                                </td>
                                <td>
                                    <xsl:value-of select="correctResponse/value"/> 
                                </td>
                                <td>
                                    <ul>
                                        <li><xsl:value-of select="incorrectResponses/value[1]"/></li>
                                        <li><xsl:value-of select="incorrectResponses/value[2]"/></li>
                                        <li><xsl:value-of select="incorrectResponses/value[3]"/></li>
                                    </ul>
                                </td>
                                <td>
                                    <xsl:value-of select="@complexity"/> 
                                </td>
								<td>
                                    <xsl:value-of select="@subject"/>
                                </td>
                            </tr>
                        </xsl:for-each>
                 </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>