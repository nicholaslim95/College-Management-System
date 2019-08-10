<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : programme.xsl
    Created on : 11 August 2019, 04:32
    Author     : Fredrick24
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
   <xsl:template match="/">
        <html>
            <head>
                <title>Programme</title>
            </head>
            <body>
                <h3>Programme List</h3>
                <table border = "1">
                    <tr bgcolor = "#9acd32">
                        <th>No.</th>
                        <th>Programme Name</th>
                        <th>Programme ID</th>
                        <th>Programme Description</th>
                        <th>Minimum Entry Requirements:</th>
                        <th>Duration Period</th>
                    </tr>
                    <xsl:for-each select="//programme">
                        <!--<xsl:if  test="position() &gt;= 3 and position() &lt;= 5"> -->
                        <!--<xsl:if test="@type='vegetable' or @type='fruit' ">-->
                        <tr>
                            <td>
                                <xsl:number />
                            </td>
                            <td>
                                <xsl:value-of select="programmeId" />
                            </td>
                            <td>
                                <xsl:value-of select="programmeName" />
                            </td>
                             <td>
                                <xsl:value-of select="programmeDesc" />
                            </td>
                             <td>
                                <xsl:value-of select="MER" />
                            </td>
                             <td>
                                <xsl:value-of select="duration" />
                            </td>
                        </tr>
                        <!--</xsl:if>-->
<!--                        </xsl:if>-->
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
