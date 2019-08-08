<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Shortlists</title>
            </head>
            <body>
                <h3>Shortlist Courses</h3>
                <table border = "1" class="table table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Course ID</th>
                        <th>Course name</th>
                    </tr>
                    <xsl:for-each select="//shortlist">
                        <tr>
                            <td>
                                <xsl:number />
                            </td>
                            <td>
                                <xsl:value-of select="courseId" />
                            </td>
                            <td>
                                <xsl:value-of select="courseName" />
                            </td>
                            <td>
                                <href a="compareCourse.php?id=">
                                    Delete
                                </href>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
