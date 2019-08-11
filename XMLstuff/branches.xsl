<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Branches</title>
            </head>
            <body>
                <h3>All Branches</h3>
                <table border = "1" class="table table-hover">
                    <tr>
                        <th style='text-align:center'>No.</th>
                        <th style='text-align:center'>Branch ID</th>
                        <th style='text-align:center'>Action</th>
                    </tr>
                    <xsl:for-each select="//branch">
                        <tr>
                            <td style='text-align:center'>
                                <xsl:number />
                            </td>
                            <td style='text-align:center'>
                                <xsl:value-of select="branchId" />
                            </td>
                            <td style='text-align:center'>
                               <a class='btn btn-default' href='compareBranches.php'>Delete</a>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
